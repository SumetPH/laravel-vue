<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'education' => $data['education'],
            'position' => $data['position'],
            'branch' => $data['branch'],
            'faculty' => $data['faculty'],
            'university' => $data['university'],
            'campus' => $data['campus'],
            'number' => $data['number'],
        ]);
    }

    // disable auto login after registration
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator->fails()){
            $alert = [
                'alert_text' => 'การลงทะเบียนมีข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
                'alert_color' => 'danger'
            ];
            return redirect()->back()->with($alert);

        } else {
            $alert = [
                'alert_text' => 'การลงทะเบียนสำเร็จ กรุณารอการยืนยันจากเจ้าหน้าที่ ก่อนเข้าใช้งาน',
                'alert_color' => 'primary'
            ];
            $user = $this->create($request->all());
            return redirect('/login')->with($alert);
        }
    }
}
