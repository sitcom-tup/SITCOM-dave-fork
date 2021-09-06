<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidNumber;

class UpdateCompanyProfileRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd($this->route('company'));
        return [
            'comp_name' => ['required','string','max:50'],
            'comp_email'=> ['required','email:rfc,dns','string','max:50', 'unique:App\Models\Company,comp_email,'.$this->route('company')],
            'comp_website' => ['required','string'],
            'comp_contact' => ['required', new ValidNumber()],
            'comp_address' => ['required', 'string', 'max:255'],
            'comp_lat' => ['required'],
            'comp_lng' => ['required']
        ];
    }
}
