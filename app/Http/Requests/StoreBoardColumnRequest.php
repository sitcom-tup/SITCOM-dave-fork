<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreBoardColumnRequest extends FormRequest
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
            'board_id' => ['required', 'string'],
            'column_name'=> ['required','string','max:100'],
            'column_style'=> ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'column_name.required' => 'Column / Section name cannot be empty',
        ];
    }
}
