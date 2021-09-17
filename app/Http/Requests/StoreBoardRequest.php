<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreBoardRequest extends FormRequest
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
            'name' => ['required','string','unique:App\Models\Board,board_name,'.$this->route('board')],
            'users' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Board name was already been taken by others',
            'users.required' => 'One or more users is required'
        ];
    }
}
