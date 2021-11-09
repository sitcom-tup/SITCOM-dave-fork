<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPoolRequest extends FormRequest
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
            'socket_id' => ['required','string'],
            'is_active' => ['required','string'],
            'last_seen' => ['required','string'],
            'device' => ['required','string'],
        ];
    }

    public function messages()
    {
        return [
            'last_seen.date_format' => 'Invalid date format Y-m-d H:i:s'
        ];
    }
}
