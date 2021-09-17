<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status'=>'failed',
                                                        'message'=>'unprocessable entity',
                                                        'errors'=>$validator->errors()->all()], 422));
    }

    public function rules()
    {
        return [
            'email'=>['required','email:rfc,dns','string','max:50', 'exists:users,email'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please provide your email address',
            'email.max' => 'Maximum characters reached',
            'email.email' => 'Must be a valid email address',
            'email.exists' => 'No email address found in SITCOM\'s record',
        ];
    }
}
