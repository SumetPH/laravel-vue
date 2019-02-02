<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Hash;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected function guard(){
        return Auth::guard('admin');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login_admin');

    }
    

    public function login(Request $req)
    {
        $admin = Admin::all()->count();
        if($admin == 0)
        {
            $admin = new Admin;
            $admin->username = 'admin';
            $admin->password = Hash::make('admin');
            $admin->firstname = 'Admin';
            $admin->save();
        }
        
        if(Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password])){
            return redirect('/admin');
        }
        else 
        {
            $alert = [
                'alert_text' => 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง',
                'alert_color' => 'danger'
            ];
            return redirect()
                ->back()
                ->with($alert)
                ->withInput(
                    $req->except('password')
                );
        }
    }

    public function logout(Request $req)
    {
        Auth::guard('admin')->logout();
        // $req->session()->flush();
        // $req->session()->regenerate();
        return redirect('/admin/login');
    }
}
