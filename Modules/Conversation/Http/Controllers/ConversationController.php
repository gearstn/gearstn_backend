<?php

namespace Modules\Conversation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Conversation\Entities\Conversation;
use Modules\Conversation\Http\Requests\StoreConversationRequest;
use Modules\Conversation\Http\Resources\ConversationResource;

class ConversationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreConversationRequest $request)
    {
        $inputs = $request->validated();
        $conversation = Conversation::create($inputs);
        return response()->json(new ConversationResource($conversation), 200);
    }
    
    public function get_user_conversations()
    {
        $id = Auth::user()->id;
        $conversations = Conversation::where('sender_id', $id)->orWhere('receiver_id', $id)->paginate(number_in_page());
        return ConversationResource::collection($conversations)->additional(['status' => 200, 'message' => 'Conversations fetched successfully']);
    }
    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $conversation = Conversation::findOrFail($id);
        $conversation->delete();
        return response()->json(new ConversationResource($conversation), 200);
    }

}