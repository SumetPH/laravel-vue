<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use App\User;
use Mail;
use Hash;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('user.mail.index');
    }

    public function send(Request $req)
    {   
        $email = $req->email;
        $user = User::where('email',$email)->first();
        if($user){
            $hash = $this->encrypt_decrypt('encrypt',$user->id);
            Mail::to($user->email)->send(new ResetPassword($hash));
            
            $alert = [
                'alert_text' => 'ทำการส่งการรีเซ็ตรหัสผ่านไปยังอีเมลของท่านแล้ว',
                'alert_color' => 'success'
            ];
            return redirect()->back()->with($alert);
        } else {
            $alert = [
                'alert_text' => 'อีเมลของคุณยังไม่ได้ทำการสมัครสมาชิก',
                'alert_color' => 'danger'
            ];
            return redirect()->back()->with($alert);
        }
    }

    public function hash($hash)
    {
        $id = $this->encrypt_decrypt('decrypt',$hash);
        return view('user.mail.reset')->with('id',$id);
    }

    public function reset(Request $req)
    {
        if($req->password1 == $req->password2){
            $user = User::find($req->id);

            $user->password = Hash::make($req->password1);
            if($user->save()){
                $alert = [
                    'alert_text' => 'ทำการเปลี่ยนรหัสผ่านเรียบร้อยแล้ว',
                    'alert_color' => 'success'
                ];
                return redirect('/login')->with($alert);
            } else {
                $alert = [
                    'alert_text' => 'มีข้อผิดผลาดในการเปลียนรหัสผ่าน',
                    'alert_color' => 'danger'
                ];
                return redirect()->back()->with($alert);
            }
        } else {
            $alert = [
                'alert_text' => 'รหัสผ่านใหม่ไม่ตรงกัน',
                'alert_color' => 'danger'
            ];
            return redirect()->back()->with($alert);
        }
        
    }

    function encrypt_decrypt($action, $string) 
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}
