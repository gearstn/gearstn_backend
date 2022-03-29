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

        $inputs['fawry_order_status_id'] = OrderStatus::where('name',$inputs['orderStatus'])->first()->id;
        $inputs['user_id'] = User::find($inputs['customerProfileId'])->first()->id;
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
}
