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
        $user = User::where('email',$req->email)->get();
        if($user->count() === 0){
            $user = new User;
            $user->title = $req->title;
            $user->academic = $req->academic;
            $user->firstname = $req->firstname;
            $user->lastname = $req->lastname;
            $user->email = $req->email;
            $user->password = bcrypt($req->password);
            $user->education = $req->education;
            $user->position = $req->position;
            $user->branch = $req->branch;
            $user->faculty = $req->faculty;
            $user->university = $req->university;
            $user->campus = $req->campus;
            $user->number = $req->number;
            if($user->save()){
                return response()->json('success');
            } else {
                return response()->json('error');
            }
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
                    return response()->json([
                        'status' => 'error'
                    ]);
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
            if($user->active == 1){
                if(Hash::check($req->password,$user->password)){
                    return response()->json([
                        'status' => 'user',
                        'user' => $user
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error'
                ]);
            }
        }
    }
}
