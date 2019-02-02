<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with('users',$users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $alert = [
            'alert_text' => 'ทำการบันทึกเรียบร้อยแล้ว',
            'alert_color' => 'success'
        ];

        $user = User::find($id);
        $user->active = $req->active;
        $user->save();
        return redirect('/admin/user')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alert = [
            'alert_text' => 'ลบบัญชีผู้ใช้งานเรียบร้อยแล้ว',
            'alert_color' => 'success'
        ];

        // delete user in users table.
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with($alert);
        
        // delete files from posts of user
        // $posts = Post::where('user_id',$id)->get();
        // foreach ($posts as $post)
        // {
        //     Storage::delete($post->file);
        // }
        
        // delete posts in post1s table by user_id.
        // Post::where('user_id',$id)->delete();
    }
}
