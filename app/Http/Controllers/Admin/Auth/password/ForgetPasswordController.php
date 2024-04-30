<?php

namespace App\Http\Controllers\Admin\Auth\password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Notifications\Admin\ResetPasswordNotification;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('admin.auth.passwords.email');
    }

    public function getVerficationCode(Request $request)
    {
        $request->validate([
            'email'=>['required' , 'email' , 'exists:admins,email'],
        ]);
        $email = $request->email;
        $admin =  Admin::where('email' , $email)->first();

        $admin->notify(new ResetPasswordNotification());

        return redirect()->route('admin.password.otp.form' , ['email'=>$admin->email]);


    }

    public function otpForm($email)
    {
        return view('admin.auth.passwords.confirm' , ['email'=>$email]);
    }
}
