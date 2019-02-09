<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ResetPassword;
use App\User;
use Mail;
use Hash;

class ForgotPasswordController extends Controller
{
    public function send(Request $req)
    {   
        $email = $req->email;
        $user = User::where('email',$email)->first();
        if($user){
            $hash = $this->encrypt_decrypt('encrypt',$user->id);
            Mail::to($user->email)->send(new ResetPassword($hash));
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }

    public function hash($hash)
    {
        return response()->json($id);
    }
    
    public function reset(Request $req)
    {
        $id = $this->encrypt_decrypt('decrypt',$req->hash);
        $user = User::find($id);

        $user->password = Hash::make($req->new_password);
        if($user->save()){
            return response()->json('success');
        } else {
            return response()->json('error');
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
