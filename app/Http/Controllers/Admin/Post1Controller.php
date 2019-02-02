<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostComment;

class Post1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.post.index')->with('posts',$posts );
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
        $post = Post::find($id);
        $comments = PostComment::where('post_id',$id)->orderBy('created_at','asc')->get();
        $data = [
           'post' => $post,
           'comments' => $comments
       ];
       return response()->json($data);
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
        $post = Post::find($id);
        $post->status = $req->status;

        if($req->status == 'ผ่านการตรวจสอบแล้ว'){
            $post->step1 = 'ผ่านการตรวจสอบแล้ว';
        }else{
            $post->step1 = 'กำลังดำเนินการ';
        }

        if($post->save()){
            return response()->json('success');
        } else {
            return response()->json('error');
        }
    

        // $alerts = [
        //     'alert_text' => 'ทำการบันทึกผลการประเมิณเรียบร้อยแล้ว',
        //     'alert_color' => 'success'
        // ];
        // return redirect()->back()->with($alerts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
