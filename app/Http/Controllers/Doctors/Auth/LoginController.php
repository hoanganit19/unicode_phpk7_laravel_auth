<?php

namespace App\Http\Controllers\Doctors\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function __construct()
    {
        //$this->middleware('guest:doctor')->except('logout');
    }

    public function login(){

        return view('doctors.auth.login');
    }

    public function handleLogin(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]
        );

        $validator->validate();

        //Xử lý login
        $dataLogin = $request->except(['_token', 'remember']);

        if ($request->remember){
            $remember = true;
        }else{
            $remember = false;
        }

        //dd($dataLogin);
        $loginStatus = Auth::guard('doctor')->attempt($dataLogin, $remember);

        if ($loginStatus){
            return redirect()->route('doctors.index');
        }

        return back()
            ->with('msg', 'Đăng nhập không thành công')
            ->withInput();
    }

    public function logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doctors.login');
    }
}
