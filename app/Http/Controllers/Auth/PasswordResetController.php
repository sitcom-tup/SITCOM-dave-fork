<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Services\ReceiveOrderNumber;
use App\Mail\PasswordResetMail;
use Illuminate\Http\Request;
use App\Models\User;

class PasswordResetController extends Controller
{
    public function index(Request $request)
    {
        if(\DB::select('SELECT email FROM password_resets WHERE email = ? AND token = ?', [$request->email,$request->confirmation]))
        {
            return view('password.passwordIndex')->with('email',$request->get('email'));
        }

        return abort(404);
    }
 
    public function sendRequest(PasswordResetRequest $request)
    {
        $confirmation  = new ReceiveOrderNumber();
        $number = $confirmation->confirmationNumber();

        $user = User::where('email', $request->email)->first();

        \DB::table('password_resets')->upsert([['email'=>$request->email,'token'=>$number,'created_at'=>now()]],
                                                ['email']);
        // \DB::insert('INSERT into password_resets (email,token,created_at) VALUES (?,?,?)',[$request->email,$number,now()]);

        Mail::to($request->email)->send(new PasswordResetMail($user,$number));

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Password reset link was sent to your email', 
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|string|min:8'
        ]);

        $state = \DB::table('password_resets')
                ->where('email',$request->email)
                ->where('token',$request->confirmation)
                ->delete();

        if($user = User::where('email',$request->email)->first())
        {
            $user->update(['password' => \Hash::make($request->password)]);

            return redirect()->route('success_password')->with('success', 'Password reset succeeded!');
        }
        
        return abort(419);
    }

    public function successPassword()
    {
        return view('password.passwordResetSuccess');
    }
}
