<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class TaskBoardRequest extends FormRequest
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
            'status' => ['nullable'],
            'verified'=> ['nullable'],
            'assigned' => ['nullable'],
            'user' => ['nullable','integer'],
            'limit' => ['nullable','integer'],
            'order_by' => ['nullable','string'],
            'order_as' => ['nullable','string'],
            'due_date' => ['nullable','date_format:Y-m-d'],
            'start_date' => ['nullable','date_format:Y-m-d'],
        ];
    }
}
