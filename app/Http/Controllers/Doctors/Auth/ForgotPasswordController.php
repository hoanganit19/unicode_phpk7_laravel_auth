<?php

namespace App\Http\Controllers\Doctors\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showForm(){
        return view('doctors.auth.forgot_password');
    }

    public function sendEmail(Request $request){

        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        if ($response == Password::RESET_LINK_SENT){
            return back()->with('msg', 'Vui lòng kiểm tra email để đặt lại mật khẩu');
        }

        return back()->with('msg', 'Bạn không thể lấy lại mật khẩu lúc này');

    }

    public function broker()
    {
        return Password::broker('doctors');
    }
}
