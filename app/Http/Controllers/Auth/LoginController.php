<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */

    public function showLoginForm()
    {
        return view('auth.login_user');
    }

    public function login(Request $req)
    {
        $user = User::where('email',$req->email)->first();
        if($user == null)
        {
            $alert = [
                'alert_text' => 'อีเมลของคุณยังไม่ได้ทำการสมัครสมาชิก',
                'alert_color' => 'danger'
            ];
            return redirect()->back()->with($alert);
        } 
        else if($user->active == 0) 
        {
            $alert = [
                'alert_text' => 'บัญชีของคุณยังไม่ได้รับการอนุมัติ',
                'alert_color' => 'danger'
            ];
            return redirect()->back()->with($alert);
        } 
        else 
        {
            if(Auth::guard('web')->attempt(['email' => $req->email, 'password' => $req->password,'active' => 1]))
            {
                return redirect('/home');
            } 
            else 
            {
                $alert = [
                    'alert_text' => 'รหัสผ่านของคุณไม่ถูกต้อง',
                    'alert_color' => 'danger'
                ];
                return redirect()->back()->with($alert);
            }
        }
    }

    public function logout(Request $req)
    {
        Auth::guard('web')->logout();
        // $req->session()->flush();
        // $req->session()->regenerate();
        return redirect('/login');
    }
}
