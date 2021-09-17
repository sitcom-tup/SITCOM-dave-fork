<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Coordinator;
use Illuminate\Http\Request;
use App\Mail\AccountVerification;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class AccountVerificationController extends Controller
{
    public function sendRequest(Request $request)
    {        
        $user = User::where('id',$request->id)->first();

        switch ($user->role) {
            case 3:
                $email = Coordinator::where('course_id',$user->student->course->id)->first()->user->email;
                Mail::to($email)->send(new AccountVerification($user));
                break;
            case 5:
                $emails = User::where('role',4)->pluck('email');
                Mail::to('sitcom.tup@gmail.com')->bcc($emails)->send(new AccountVerification($user));
                break;
            default:
                return response()->json(['status'=>'failed','code'=>400,'message'=>'Could not process request!']);
                break;
        }

        return response()->json([
            'status'=>'success',
            'code' => 200,
            'message' => 'Account verification request sent!'
        ]);
    }
}
