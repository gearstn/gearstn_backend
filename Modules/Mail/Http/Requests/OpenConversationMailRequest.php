<?php

namespace Modules\Mail\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenConversationMailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'acquire_id' => 'required',
            'owner_id' => 'required',
            'machine_id' => 'required',
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
