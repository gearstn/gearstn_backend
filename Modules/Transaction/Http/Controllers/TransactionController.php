<?php

namespace Modules\Transaction\Http\Controllers;

use App\Classes\POST_Caller;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Http\Controllers\SubscriptionController;
use Modules\Transaction\Entities\OrderStatus;
use Modules\Transaction\Entities\Transaction;
use Modules\Transaction\Http\Requests\StoreTransactionRequest;
use Modules\Transaction\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @return Renderable
     */
    public function store(StoreTransactionRequest $request)
    {
        $inputs = $request->validated();
        $subscription_data = [
            'subscription_id' => $inputs['subscription_id'],
        ];

        $inputs['fawry_order_status_id'] = OrderStatus::where('name_en',$inputs['orderStatus'])->first()->id;
        $inputs['user_id'] = User::find($inputs['customerProfileId'])->id;
        unset($inputs['orderStatus'],$inputs['customerProfileId'],$inputs['subscription_id']);

        $post = new POST_Caller(SubscriptionController::class,'subscribe',Request::class,$subscription_data);
        $response = $post->call();
        if($response->status() != 200) { return $response; }

        Transaction::create($inputs);

        return response()->json([
            'message_en' => 'Transaction Created Succesfully',
            'message_ar' => 'لقد تم تسجيل العملية بنجاح',
        ],200);
    }

        /**
     * Store a newly created resource in storage.
     * @return Renderable
     */
    public function extra_plan_store(StoreTransactionRequest $request)
    {
        $inputs = $request->validated();
        $subscription_data = [
            'number_of_listing' => $inputs['number_of_listing'],
            'number_of_months' => $inputs['number_of_months']
        ];

        $inputs['fawry_order_status_id'] = OrderStatus::where('name_en',$inputs['orderStatus'])->first()->id;
        $inputs['user_id'] = User::find($inputs['customerProfileId'])->first()->id;
        unset($inputs['orderStatus'],$inputs['customerProfileId'],$inputs['number_of_listing'],$inputs['number_of_months']);
        $subscription_data['user_id'] = $inputs['user_id'];
        $post = new POST_Caller(SubscriptionController::class,'extra_plan_subscribe',Request::class,$subscription_data);
        $response = $post->call();
        if($response->status() != 200) { return $response; }

        Transaction::create($inputs);

        return response()->json([
            'message_en' => 'Transaction Created Succesfully',
            'message_ar' => 'لقد تم تسجيل العملية بنجاح',
        ],200);
    }

    public function user_transactions()
    {
        $user = User::find(auth()->user()->id);
        $transactions = Transaction::where('user_id',$user->id)->get();
        return TransactionResource::collection($transactions)->additional(['status' => 200, 'message' => 'Transactions fetched successfully']);
    }
}
