<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Subscription\Entities\Subscription;
use Modules\Subscription\Http\Resources\SubscriptionResource;
use Modules\User\Entities\User;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $subscriptions = Subscription::paginate(number_in_page());
        return SubscriptionResource::collection($subscriptions)->additional(['status' => 200, 'message' => 'Subscriptions fetched successfully']);
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return response()->json(new SubscriptionResource($subscription), 200);
    }

    public function subscribe(Request $request)
    {
        $inputs = $request->all();

        $validator = Validator::make($inputs, ["subscription_id" => "required"]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $subscription = Subscription::find($inputs['subscription_id']);
        $user = User::find(auth()->user()->id);
        $user = $user->subscription()->save($subscription);
        return response()->json([
            'message_en' => 'You Have subscribed successfully',
            'message_ar' => 'لقد قمت بالاشتراك بنجاح',
        ],200);
    }

}
