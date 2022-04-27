<?php

namespace Modules\Subscription\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Subscription\Entities\ExtraPlan;
use Modules\Subscription\Http\Resources\ExtraPlanResource;
use Modules\Subscription\Http\Resources\SubscriptionResource;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, ['plan_type' => 'required'] );
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $subscriptions = app('rinvex.subscriptions.plan')->where('slug', 'LIKE', '%'.$inputs['plan_type'].'%')->get();
        return SubscriptionResource::collection($subscriptions)->additional(['status' => 200, 'message' => 'Subscriptions fetched successfully']);
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
        $user_subscriptions = $user->activeSubscriptions()->toArray();

        $user_machine_distributor = false;
        $user_spare_parts_distributor = false;

        // If target plan is true then the target plan is for a machine distributor
        // else If target plan is false then the target plan is for a spare parts distributor
        $target_plan = str_contains($subscription->slug, 'machine-distributor');

        if ($user_subscriptions !== []) {
            foreach ($user_subscriptions as $user_subscription) {
                if( str_contains($user_subscription['slug'], 'machine-distributor')) $user_machine_distributor = true;
                if( str_contains($user_subscription['slug'], 'spare-parts-distributor')) $user_spare_parts_distributor = true;
            }
            if($user_machine_distributor && $user_spare_parts_distributor){
                return response()->json([
                    'message_en' => 'You Have an active subscription for machines and spare parts you can not subscribe again',
                    'message_ar' => 'لديك اشتراك نشط للماكينات وقطع الغيار لا يمكنك الاشتراك مرة أخرى',
                ],422);
            }
            else if($user_machine_distributor && $target_plan){
                return response()->json([
                    'message_en' => 'You Have an active subscription for machines you can not subscribe again',
                    'message_ar' => 'لديك اشتراك نشط في للماكينات لا يمكنك الاشتراك فيها مرة أخرى',
                ],422);
            }
            else if($user_spare_parts_distributor && !$target_plan){
                return response()->json([
                    'message_en' => 'You Have an active subscription for spare parts you can not subscribe again',
                    'message_ar' => 'لديك اشتراك نشط لقطع الغيار لا يمكنك الاشتراك مرة أخرى',
                ],422);
            }
        }

        $user = $user->newSubscription($subscription->slug.'-'.$user->id,$subscription);
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
        $subscription = $user->activeSubscriptions()->where('slug', $inputs['subscription_slug'])->first();
        $subscription = app('rinvex.subscriptions.plan_subscription')->find($subscription->id)->cancel(true)->delete();
        return response()->json([
            'message_en' => 'You Have unsubscribed successfully',
            'message_ar' => 'لقد قمت بالاشتراك بنجاح',
        ], 200);
    }

    public function user_subscriptions()
    {
        $user = User::find(auth()->user()->id);
        $plan_id = $user->activeSubscriptions()->first() ? $user->activeSubscriptions()->first()->plan_id : false;
        $plan = app('rinvex.subscriptions.plan')->where('id', $plan_id)->get();
        return SubscriptionResource::collection($plan)->additional(['status' => 200, 'message' => 'Subscriptions fetched successfully']);
    }


    public function user_extra_subscriptions()
    {
        $user_id = auth()->user()->id;
        $extra_plans = ExtraPlan::where('user_id',$user_id)->get();
        return ExtraPlanResource::collection($extra_plans)->additional(['status' => 200, 'message' => 'Extra Subscriptions fetched successfully']);
    }

    public function extra_plan_subscribe(Request $request)
    {
        $inputs = $request->all();

        $validator = Validator::make($inputs, [
            'number_of_listing' => 'required',
            'number_of_months' => 'required',
            'user_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $inputs['starts_at'] =  Carbon::now();
        $inputs['ends_at'] =  Carbon::now()->addMonths($inputs['number_of_months']);
        $inputs['photos_of_listing'] =  5;
        $user_extra_plans_count = ExtraPlan::where('user_id', $inputs['user_id'])->count();
        $user_extra_plans_count = $user_extra_plans_count + 1;
        $inputs['name'] =  'extra-plan-' . $inputs['user_id'] . '-' . $user_extra_plans_count;
        ExtraPlan::create($inputs);
        return response()->json([
            'message_en' => 'You Have subscribed for your extra plan successfully',
            'message_ar' => 'لقد اشتركت في خطتك الإضافية بنجاح',
        ], 200);
    }
}
