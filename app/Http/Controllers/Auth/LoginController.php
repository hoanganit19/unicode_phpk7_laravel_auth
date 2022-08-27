<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loggedOut(){
        return redirect()->route('login');
    }

    public function username()
    {
        return 'username';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ], [
            $this->username().'.required' => 'Tên đăng nhập bắt buộc phải nhập',
            'password.required' => 'Mật khẩu bắt buộc phải nhập'
        ]);
    }

    protected function sendFailedLoginResponse(){

        return redirect()->route('login')->with('msg', trans('auth.failed'));
    }

    protected function authenticated(Request $request, $user){
        if ($user->role==0){
            return redirect('/');
        }
    }
}
