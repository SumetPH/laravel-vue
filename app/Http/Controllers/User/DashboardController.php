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
            ->where('user_id', $req->id)
            ->where(function($q){
                $q->where('step1','=','0')->orWhere('step3check','=','0');
            })
            ->orderBy('created_at')
            ->get();

        $posts_checked = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.firstname')
            ->where('user_id', $req->id)
            ->where(function($q){
                $q->where('step1','=','1')->where('step3check','=','1');
            })
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
