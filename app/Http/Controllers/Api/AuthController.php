<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use Hash;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $user = new User([
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'education' => $req->education,
            'position' => $req->position,
            'branch' => $req->branch,
            'faculty' => $req->faculty,
            'university' => $req->university,
            'campus' => $req->campus,
            'number' => $req->number,
        ]);
        if($user->save()){
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    }

    public function login(Request $req)
    {
        if($req->email == 'admin'){
            // Admin
            $admin = Admin::all()->first();
            if($admin) {
                if(Hash::check($req->password,$admin->password)){
                    return response()->json([
                        'status' => 'admin',
                        'admin' => $admin
                    ]);
                } else {
                    return response()->json('error');
                }
            }
            else {
                $admin = new Admin;
                $admin->username = 'admin';
                $admin->password = Hash::make('admin');
                $admin->firstname = 'Admin';
                $admin->save();

                return response()->json([
                    'status' => 'admin',
                    'admin' => $admin
                ]);

            }
        } else {
            // User
            $user = User::where('email',$req->email)->first();
            if($user->active != 0){
                if(Hash::check($req->password,$user->password)){
                    return response()->json([
                        'status' => 'user',
                        'user' => $user
                    ]);
                } else {
                    return response()->json('error');
                }
            } else {
                return response()->json('not access');
            }
        }
    }
}
