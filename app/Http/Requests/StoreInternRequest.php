<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreInternRequest extends FormRequest
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
            'required_hours' => ['required','integer'],
            'rendered_hours' => ['required','integer'],
            'endorsement_date' => ['required', 'date_format:Y-m-d'],
            'start_date' => ['nullable','date_format:Y-m-d'],
            'end_date' => ['nullable','date_format:Y-m-d'],
            'remarks' => ['nullable','integer'],
            'student' => ['required','integer'],
            'supervisor' => ['required','integer'],
            'coordinator' => ['required','integer'],
            'batch' => ['required', 'date_format:Y'],
            'intern_files' => ['nullable','integer']
        ];
    }
}
