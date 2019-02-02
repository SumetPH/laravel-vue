<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class UserController extends Controller
{
    public function index(Request $req)
    {
        $posts = Post::where('user_id',$req->id)->get();
        
        $posts_checking = Post::where('user_id', $req->id)
            ->where(function($q){
                $q->where('step1','!=','ผ่านการตรวจสอบแล้ว')
                ->orWhere('step3','!=','ผ่านการตรวจสอบแล้ว');
            })
            ->get();

        $posts_checked = Post::where('user_id', $req->id)
        ->where('step1','=','ผ่านการตรวจสอบแล้ว')
        ->where('step3','=','ผ่านการตรวจสอบแล้ว')
        ->get();

        $data = [
            'posts' => $posts,
            'posts_checking' => $posts_checking,
            'posts_checked' => $posts_checked
        ];
        // return view('home')->with($data);

        return response()->json($data);
    }
}
