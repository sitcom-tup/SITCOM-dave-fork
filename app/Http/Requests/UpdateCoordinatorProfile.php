<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Coordinator;
use App\Rules\ValidNumber;
use Request;


class UpdateCoordinatorProfile extends FormRequest
{

    protected $coordinator;

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
        $id = Request::input('coordinator_id');
        $this->coordinator = Coordinator::find($id);

        return [
            'coordinator_id'=> ['required','integer'],
            'fname'=>['required','string','max:20'],
            'lname'=>['required','string','max:20'],
            'email'=>['required','email:rfc,dns','string','max:50', 'unique:App\Models\User,email,'.$this->coordinator->user_id],
            'password'=>['required','string','min:8'],
            'coordinator_position'=>['required','string'],
            'coordinator_gender'=>['required'],
            'coordinator_link'=>['nullable','string'],
            'coordinator_contact'=> new ValidNumber(),
            'department_id'=>['required','integer'],
            'course_id'=>['required','integer'],
            'state'=>['nullable','integer']
        ];
    }
}
