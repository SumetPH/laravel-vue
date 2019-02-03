<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use DB;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
        $users_confirm = User::where('active','1')->get();

        $users_new = User::where('active','0')->get();

        $posts = Post::all();

          $posts_checking = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.firstname')
            ->where('step1','=','0')
            ->orWhere('step3check','=','0')
            ->get();

        $posts_checked = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.firstname')
            ->where('step1','=','1')
            ->where('step3check','=','1 ')
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
