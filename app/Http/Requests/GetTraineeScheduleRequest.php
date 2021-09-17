<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GetTraineeScheduleRequest extends FormRequest
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
            'name' => ['nullable', 'string'],
            'student' => ['nullable','integer'],
            'supervisor' => ['nullable', 'integer'],
            'day' => ['nullable', 'integer'],
        ];
    }
}
