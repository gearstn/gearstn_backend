<?php

namespace Modules\Subscription\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Subscription\Http\Resources\SubscriptionResource;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $subscriptions = app('rinvex.subscriptions.plan')->all();
        return SubscriptionResource::collection($subscriptions)->additional(['status' => 200, 'message' => 'Subscriptions fetched successfully']);     ;
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $subscription = app('rinvex.subscriptions.plan')->find($id);
        return response()->json(new SubscriptionResource($subscription), 200);
    }

    public function subscribe(Request $request)
    {
        $inputs = $request->all();

        $validator = Validator::make($inputs, ["subscription_id" => "required"]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $subscription = app('rinvex.subscriptions.plan')->find($inputs['subscription_id']);
        $user = User::find(auth()->user()->id);
        $user = $user->newSubscription($subscription->name,$subscription);
        return response()->json([
            'message_en' => 'You Have subscribed successfully',
            'message_ar' => 'لقد قمت بالاشتراك بنجاح',
        ],200);
    }

    public function unsubscribe(Request $request)
    {
        $inputs = $request->all();

        $validator = Validator::make($inputs, ["subscription_slug" => "required"]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $user = User::find(auth()->user()->id);
        $subscription = $user->activeSubscriptions()->where('slug',$inputs['subscription_slug'])->first();
        $subscription = app('rinvex.subscriptions.plan_subscription')->find($subscription->id)->cancel(true)->delete();
        return response()->json([
            'message_en' => 'You Have unsubscribed successfully',
            'message_ar' => 'لقد قمت بالاشتراك بنجاح',
        ],200);    
    }

    public function user_subscriptions()
    {
        $user = User::find(auth()->user()->id);
        return SubscriptionResource::collection($user->activeSubscriptions())->additional(['status' => 200, 'message' => 'User Subscriptions fetched successfully']);     ;
    }

}
