<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidNumber;
use App\Rules\ValidId;
use App\Models\Student;
use Request;

class UpdateStudentProfileRequest extends FormRequest
{

    protected $student;

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
        $id = Request::input('student_id');
        $this->student = Student::find($id);
        
        return [
            'email'=>['required','email:rfc,dns','string','max:50', 'unique:App\Models\User,email,'.$this->student->user_id],
            'student_tup_id'=> [new ValidId(),'unique:App\Models\Student,student_tup_id,'.$id],
            'fname'=>['required','string','max:20'],
            'lname'=>['required','string','max:20'],
            'password'=>['nullable','confirmed','string','min:8'],
            'student_gender'=>['required'],
            'student_link' => ['nullable','string'],
            'course_id'=>['required','integer'],
            'student_contact'=> new ValidNumber(),
            'student_address'=>['required','string','max:250'],
            'student_birthday'=>['nullable','date_format:Y-m-d'],
            'verified_at' => ['nullable', 'integer'],
        ];
    }
}
