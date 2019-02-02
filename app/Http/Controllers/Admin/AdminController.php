<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;

class AdminController extends Controller
{
    public function index(Request $req)
    {
        $users_confirm = User::where('active','1')->get();

        $users_new = User::where('active','0')->get();

        $posts = Post::all();

        $posts_checking = Post::where('step1','!=','ผ่านการตรวจสอบแล้ว')
            ->orWhere('step3','!=','ผ่านการตรวจสอบแล้ว')
            ->get();

        $posts_checked = Post::where('step1','=','ผ่านการตรวจสอบแล้ว')
            ->where('step3','=','ผ่านการตรวจสอบแล้ว')
            ->get();

        $data = [
            'users_confirm' => $users_confirm,
            'users_new' => $users_new,
            'posts' => $posts,
            'posts_checking' => $posts_checking,
            'posts_checked' => $posts_checked   
        ];

        return response()->json($data);
    }
}
