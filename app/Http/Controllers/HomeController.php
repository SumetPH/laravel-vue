<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id',Auth::id())->get();
        
        $posts_checking = Post::where('user_id',Auth::id())
            ->where(function($q){
                $q->where('step1','!=','ผ่านการตรวจสอบแล้ว')
                ->orWhere('step3','!=','ผ่านการตรวจสอบแล้ว');
            })
            ->get();

        $posts_checked = Post::where('user_id',Auth::id())
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
