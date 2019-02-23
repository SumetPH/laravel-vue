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

        $posts = Post::all();

        $posts_checking = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('post1s', 'posts.id', '=', 'post1s.post_id')
            ->select('posts.*', 'post1s.title', 'post1s.academic', 'users.firstname')
            ->where('posts.step1', '=', '0')
            ->orWhere('posts.step2', '=', '0')
            ->orWhere('posts.step3', '=', '0')
            ->orderBy('created_at')
            ->get();

        $posts_checked = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('post1s', 'posts.id', '=', 'post1s.post_id')
            ->select('posts.*', 'post1s.title', 'post1s.academic', 'users.firstname')
            ->where('posts.step1', '=', '1')
            ->where('posts.step2', '=', '1')
            ->where('posts.step3', '=', '1')
            ->orderBy('created_at')
            ->get();

        $data = [
            'posts' => $posts,
            'posts_checking' => $posts_checking,
            'posts_checked' => $posts_checked
        ];

        return response()->json($data);
    }
}
