<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Supervisor;
use App\Rules\ValidNumber;
use App\Rules\ValidId;
use Request;

class UpdateSupervisorProfile extends FormRequest
{
    protected $supervisor;

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
        $id = Request::input('supervisor_id');
        $this->supervisor = Supervisor::find($id);

        return [
            'supervisor_id'=> ['required','integer'],
            'fname'=>['required','string','max:20'],
            'lname'=>['required','string','max:20'],
            'email'=>['required','email:rfc,dns','string','max:50', 'unique:App\Models\User,email,'.$this->supervisor->user_id],
            'password'=>['nullable','string','min:8'],
            'supervisor_position'=>['required','string'],
            'supervisor_link'=>['nullable','string'],
            'supervisor_contact'=> new ValidNumber(),
            'supervisor_gender'=>['required'],
            'company_id'=>['required','integer'],
            'verified_at' => ['nullable', 'integer'],
            'state'=>['nullable','integer']
        ];
    }
}
