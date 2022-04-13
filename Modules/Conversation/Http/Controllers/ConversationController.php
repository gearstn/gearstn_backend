<?php

namespace Modules\Conversation\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Conversation\Entities\Conversation;
use Modules\Conversation\Http\Requests\StoreConversationRequest;
use Modules\Conversation\Http\Requests\CheckForConversationRequest;
use Modules\Conversation\Http\Resources\ConversationResource;
use Modules\Mail\Http\Controllers\MailController;
use Modules\Mail\Http\Requests\OpenConversationMailRequest;

class ConversationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param StoreConversationRequest $request
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function store(StoreConversationRequest $request)
    {
        $inputs = $request->validated();
        $conversation = Conversation::create($inputs);

        //        Send Mail To the machine owner
        $mail_parameters = [
            'machine_id' => $inputs['machine_id'],
            'acquire_id' => $inputs['acquire_id'],
            'owner_id' => $inputs['owner_id'],
        ];
        $response = redirect()->route('open-conversation-with-seller', $mail_parameters);
        if ($response->status() != 200) {
            return $response;
        }

        return response()->json(new ConversationResource($conversation), 200);
    }

    public function get_user_conversations(): JsonResponse
    {
        $auth_id = Auth::user()->id;
        $conversations = Conversation::where('acquire_id', $auth_id)->orWhere('owner_id', $auth_id)->get();
        $result = [];
        foreach ($conversations as $conversation) {
            if ($conversation->acquire_id == $auth_id)
                $result[json_encode(User::find($conversation->owner_id, ['id', 'first_name', 'last_name']))][] = new ConversationResource($conversation);
            else
                $result[json_encode(User::find($conversation->acquire_id, ['id', 'first_name', 'last_name']))][] = new ConversationResource($conversation);
        }
        return response()->json($result, 200);
    }

    public function check_for_conversation(CheckForConversationRequest $request): JsonResponse
    {
        $inputs = $request->validated();
        $id = Auth::user()->id;
        $conversation = Conversation::where('acquire_id', $id)->Where('machine_id', $inputs['machine_id'])->first();
        return response()->json(new ConversationResource($conversation), 200);
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();
        return response()->json(new ConversationResource($conversation), 200);
    }


    public function take_survey(Request $request)
    {

        $inputs = $request->all();
        $validator = Validator::make($inputs, [
            'customer_service_rating' => 'required|integer',
            'quality_rating' => 'required|integer',
            'friendly_rating' => 'required|integer',
            'pricing_rating' => 'required|integer',
            'rating' => 'required|integer',
            'conversation_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $user_id = Auth::user()->id;
        $conversation = Conversation::find($inputs['conversation_id']);
        $conversation->rating([
            'title' => '',
            'body' => '',
            'customer_service_rating' => $inputs['customer_service_rating'],
            'quality_rating' => $inputs['quality_rating'],
            'friendly_rating' => $inputs['friendly_rating'],
            'pricing_rating' => $inputs['pricing_rating'],
            'rating' => $inputs['rating'],
            'recommend' => 'Yes',
            'approved' => true,
        ], $user_id);

        if($user_id == $conversation->acquire_id){
            $conversation->acquire_done = 1;
            $conversation->save();
        }
        else if($user_id == $conversation->owner_id){
            $conversation->owner_done = 1;
            $conversation->save();
        }
        return response()->json([
            'message_en' => 'Survey stored successfully',
            'message_ar' => 'تم تسجيل الاستبيان بنجاح',
        ],200);
    }
}
