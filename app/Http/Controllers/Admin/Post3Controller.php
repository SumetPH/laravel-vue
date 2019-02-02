<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Post3;
use App\PostComment;

class Post3Controller extends Controller
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
        //
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
        $post3 = Post3::where('post_id',$id)->get();
        $postcomments = PostComment::where('post_id',$id)->orderBy('created_at','asc')->get();
        $data = [
            'post_id' => $id,
            'post3' => $post3,
            'postcomments' => $postcomments
        ];
        return view('admin.post3.show')->with($data);  
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
        $post3 = Post3::find($id);

        if($req->file1status){
            $post3->file1status = $req->file1status;
        }

        if($req->file2status){
            $post3->file2status = $req->file2status;
        }

        if($req->file3status){
            $post3->file3status = $req->file3status;
        }

        if($req->file4status){
            $post3->file4status = $req->file4status;
        }

        if($req->file5status){
            $post3->file5status = $req->file5status;
        }

        if($req->file6status){
            $post3->file6status = $req->file6status;
        }

        if($req->file7status){
            $post3->file7status = $req->file7status;
        }

        if($req->file8status){
            $post3->file8status = $req->file8status;
        }

        if($req->file8status){
            $post3->file8status = $req->file8status;
        }

        if($req->file9status){
            $post3->file9status = $req->file9status;
        }

        if($req->file10status){
            $post3->file10status = $req->file10status;
        }

        if($req->file11status){
            $post3->file11status = $req->file11status;
        }

        if($req->file12status){
            $post3->file12status = $req->file12status;
        }

        $post3->save();

        if(
            $post3->file1status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file2status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file3status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file4status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file5status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file6status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file7status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file8status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file9status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file10status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file11status == 'ผ่านการตรวจสอบแล้ว' &&
            $post3->file12status == 'ผ่านการตรวจสอบแล้ว' 
        ) {
            $post->step3 = 'ผ่านการตรวจสอบแล้ว';
            $post3->status = 'ผ่านการตรวจสอบแล้ว';
            $post->save();
            $post3->save();
        } 
        else 
        {
            $post->step3 = 'กำลังดำเนินการ';
            $post3->status = 'กำลังดำเนินการ';
            $post->save();
            $post3->save();
        }

        $alerts = [
            'alert_text' => 'ทำการบันทึกผลการประเมิณเรียบร้อยแล้ว',
            'alert_color' => 'success'
        ];
        return redirect()->back()->with($alerts);
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
