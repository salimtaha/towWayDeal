<?php

namespace App\Http\Controllers\Admin\Auth\password;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }

    public function checkOtp(Request $request)
    {
        $otp2 = $this->otp->validate($request->email , $request->code);

        if(! $otp2->status){
            session()->flash('failed' , 'فشلت عمليه التحقق ,من فضلك ادخل الرمز الصحيح');
            return redirect()->back();
        }

        return redirect()->route('admin.password.resetform' , ['email' , $request->email]);

    }
    public function showResetForm($email)
    {
        return view('admin.auth.passwords.reset' , ['email'=>$email]);
    }

    public function resetPassword(Request $request)
    {
        return $request->url;
        // $request->validate([
        //     'password'=>['required' , 'min:8' , 'confirmed'],
        //     'email'=>['required' , 'exists:admins,email'],
        // ]);

        return $request;

        $admin = Admin::where('email' , $request->email)->first();
        $admin->update([
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success' , 'تم تعيين كلمه سر جديده بنجاح');
        return route('admin.welcome');
    }
}
