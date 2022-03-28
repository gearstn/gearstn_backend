<?php

namespace Modules\Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "type" => 'string' ,
            "referenceNumber" => 'string' ,
            "merchantRefNumber" => 'string' ,
            "orderAmount" => 'string' ,
            "paymentAmount" => 'string' ,
            "fawryFees" => 'string' ,
            "orderStatus" => 'string' ,
            "paymentMethod" => 'string' ,
            "paymentTime" => 'string' ,
            "customerName" => 'string' ,
            "customerMobile" => 'string' ,
            "customerMail" => 'string' ,
            "customerProfileId" => 'string' ,
            "authNumber" => 'string' ,
            "taxes" => 'string' ,
            "statusCode" => 'string' ,
            "statusDescription" => 'string' ,
            "basketPayment" => 'string',
            'subscription_id' => 'integer'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
