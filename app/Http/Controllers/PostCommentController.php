<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostComment;

class PostCommentController extends Controller
{
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
    public function store(Request $req)
    {
        $pc = new PostComment;
        $pc->post_id = $req->post_id;
        $pc->username = $req->username;
        $pc->msg = $req->msg;
        $pc->save();
        $alerts = [
            'alert_text' => 'คุณได้แสดงความคิดเห็นเรียบร้อยแล้ว',
            'alert_color' => 'success'
        ];
        return redirect()->back()->with($alerts);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pc = PostComment::find($id);
        $pc->delete();
        $alerts = [
            'alert_text' => 'คุณได้ลบความคิดเห็นเรียบร้อยแล้ว',
            'alert_color' => 'danger'
        ];
        return redirect()->back()->with($alerts);
    }
}
