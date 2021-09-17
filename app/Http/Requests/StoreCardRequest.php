<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
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
            'column_id' => ['required',],
            'user_id' => ['required',],
            'assignees' => ['nullable',],
            'card_name' => ['required','string','max:100'],
            'card_description' => ['nullable',],
            'start_date' => ['nullable', 'date:after_or_equal', 'date_format:Y-m-d'],
            'due_date' => ['nullable', 'date:after_or_equal', 'date_format:Y-m-d'],
            'status'  => ['nullable',],
            'verified' => ['nullable',],
        ];
    }

    public function messages()
    {
        return [
            'card_name.required' => 'Name cannot be empty',
            'card_name.max' => 'Name cannot exceed 100 characters',
            'start_date.date' => 'Should be after or equal today',
            'start_date.date_format' => 'Date format should be Year Month Day Y-m-d',
            'due_date.date' => 'Should be after or equal today',
            'due_date.date_format' => 'Date format should be Year Month Day Y-m-d',
        ];
    }
}