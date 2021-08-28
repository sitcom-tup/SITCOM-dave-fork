<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'qualification'=> ['nullable','string'],
            'user_id' => ['required', 'integer'],
            'type' => ['required', 'string'],
        ];
    }
}
