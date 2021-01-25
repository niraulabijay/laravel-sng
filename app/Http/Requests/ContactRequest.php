<?php

namespace App\Http\Requests;

use App\Http\Requests\API\MasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends MasterRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' =>'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message'=>'required'
        ];
    }
}
