<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use DB;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
        $posts = Post::where('user_id',$req->id)->get();

        $posts_checking = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.firstname')
            ->where('step1','!=','ผ่านการตรวจสอบแล้ว')
            ->orWhere('step3','!=','ผ่านการตรวจสอบแล้ว')
            ->get();

        $posts_checked = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.firstname')
            ->where('step1','=','ผ่านการตรวจสอบแล้ว')
            ->where('step3','=','ผ่านการตรวจสอบแล้ว')
            ->get();

        $data = [
            'posts' => $posts,
            'posts_checking' => $posts_checking,
            'posts_checked' => $posts_checked
        ];

        return response()->json($data);
    }
}
