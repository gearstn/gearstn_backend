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
            "type" => 'required|string' ,
            "referenceNumber" => 'required|string' ,
            "merchantRefNumber" => 'required|string' ,
            "orderAmount" => 'required|string' ,
            "paymentAmount" => 'required|string' ,
            "fawryFees" => 'required|string' ,
            "orderStatus" => 'required|string' ,
            "paymentMethod" => 'required|string' ,
            "paymentTime" => 'required|string' ,
            "customerName" => 'required|string' ,
            "customerMobile" => 'required|string' ,
            "customerMail" => 'required|string' ,
            "customerProfileId" => 'required|string' ,
            "authNumber" => 'required|string' ,
            "taxes" => 'required|string' ,
            "statusCode" => 'required|string' ,
            "statusDescription" => 'required|string' ,
            "basketPayment" => 'required|string',
            'subscription_id' => 'integer',
            'number_of_listing' => 'integer',
            'number_of_months' => 'integer'
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
