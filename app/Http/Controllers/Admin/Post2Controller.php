<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Post;
use App\Post2;

class Post2Controller extends Controller
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
        $post2 = Post2::where('post_id',$id)->get();

        if($post2->count() == 0){
            $titles = [
                '1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น',
                '2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ'
            ]; 
            foreach ($titles as $title) {
                $post2 = new Post2;
                $post2->post_id = $id;
                $post2->title = $title;
                $post2->save();
            }
            
            $post2 = Post2::where('post_id',$id)->get();
        } 

        $data = [
            'post2' => $post2,
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
        $post2 = Post2::find($id);
        Storage::delete($post2->file_path);

        $file = $req->file('file');
        $fullName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $fullNameLength = strlen($fullName);
    	$extLength = strlen($ext) + 1;
        $onlyName = substr($fullName, 0, $fullNameLength - $extLength);
        $folder = 'post2';
        $file_name = $onlyName . '_' . time() . '.' . $ext;
        $file_path = Storage::putFileAs($folder, $file, $file_name);

        $post2->file_name = $file_name;
        $post2->file_path = $file_path;
        if($post2->save()){
            $post = Post::find($req->post_id);
            $post2 = Post2::where('post_id', $req->post_id)->whereNotNull('file_name')->get();
            if($post2->count() == 2){
                $post->step2 = '1';
                $post->save();
            }
            return response()->json('success');
        } else {
            return response()->json('error');
        }
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
