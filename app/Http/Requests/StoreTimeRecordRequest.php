<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreTimeRecordRequest extends FormRequest
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
            'date' => ['required','date_format:Y-m-d','date_equals:'.Carbon::now('Asia/Manila')->format('Y-m-d')],
            'time_in' => ['required','date_format:H:i:s'],
            'timein_location' => ['required','string'],
            'student_id' => ['required','integer'],
            'time_out' => ['nullable','date_format:H:i:s'],
            'status' => ['nullable','integer'],
            'verified' => ['nullable','integer'],
        ];
    }
}
