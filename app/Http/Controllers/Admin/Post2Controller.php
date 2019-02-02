<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Post2;
use App\PostComment;

class Post2Controller extends Controller
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
    public function store(Request $req)
    {
        $file3name = '';
        $file3path = '';
        $file4name = '';
        $file4path = '';
        // file3
        if($req->hasFile('file3')){
            $file3 = $req->file('file3');
            $fileCON3 = $file3->getClientOriginalName();
            $file3name = pathinfo($fileCON3, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON3, PATHINFO_EXTENSION);
            $folder = 'post2';
            $file3path = Storage::putFileAs($folder,$file3,$file3name);
        }

        // file4
        if($req->hasFile('file4')){
            $file4 = $req->file('file4');
            $fileCON4 = $file4->getClientOriginalName();
            $file4name = pathinfo($fileCON4, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON4, PATHINFO_EXTENSION);
            $folder = 'post2';
            $file4path = Storage::putFileAs($folder,$file4,$file4name);
        }

        $post2 = new Post2;
        $post2->post_id = $req->post_id;
        $post2->file3name = $file3name;
        $post2->file3path = $file3path;
        $post2->file4name = $file4name;
        $post2->file4path = $file4path;
        $post2->save();

        $alert = [
            'alert_text' => 'ทำการบันทึกเรียบร้อยแล้ว',
            'alert_color' => 'success'
        ];
        return redirect()->back()->with($alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post2 = Post2::where('post_id',$id)->get();
        $postcomments = PostComment::where('post_id',$id)->orderBy('created_at','asc')->get();
        $data = [
            'post_id' => $id,
            'post2' => $post2,
            'postcomments' => $postcomments
        ];
        return view('admin.post2.show')->with($data);  
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
        // file3
        if($req->hasFile('file3')){
            $post2 = Post2::find($id);
            Storage::delete($post2->file3path);

            $file3 = $req->file('file3');
            $fileCON3 = $file3->getClientOriginalName();
            $file3name = pathinfo($fileCON3, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON3, PATHINFO_EXTENSION);
            $folder = 'post2';
            $file3path = Storage::putFileAs($folder,$file3,$file3name);

            $post2->file3name = $file3name;
            $post2->file3path = $file3path;
            $post2->save();
        }

        // file4
        if($req->hasFile('file4')){
            $post2 = Post2::find($id);
            Storage::delete($post2->file4path);

            $file4 = $req->file('file4');
            $fileCON4 = $file4->getClientOriginalName();
            $file4name = pathinfo($fileCON4, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON4, PATHINFO_EXTENSION);
            $folder = 'post2';
            $file4path = Storage::putFileAs($folder,$file4,$file4name);
            
            $post2->file4path = $file4path;
            $post2->file4name = $file4name;
            $post2->save();
        }

        $alert = [
            'alert_text' => 'ทำการบันทึกเรียบร้อยแล้ว',
            'alert_color' => 'success'
        ];
        return redirect()->back()->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
