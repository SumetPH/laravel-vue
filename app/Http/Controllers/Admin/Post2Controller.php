<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Post;
use App\Post2;

class Post2Controller extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
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
        $post2 = Post2::find($req->id);
        Storage::delete($post2->file_path);

        $file = $req->file('file');
        $fileCON = $file->getClientOriginalName();
        $file_name = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
        $folder = 'post2';
        $file_path = Storage::putFileAs($folder,$file,$file_name);

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

        // $post2 = Post2::where('title',$req->title)->first();
        // if($post2){
        //     return response()->json('put');
        // } else {
        //     $file = $req->file('file');
        //     $fileCON = $file->getClientOriginalName();
        //     $file_name = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
        //     $folder = 'post2';
        //     $file_path = Storage::putFileAs($folder,$file,$file_name);

        //     $post2 = new Post2();
        //     $post2->post_id = $req->post_id;
        //     $post2->title = $req->title;
        //     $post2->file_name = $file_name;
        //     $post2->file_path = $file_path;

        //     if($post2->save()){
        //         return response()->json('success');
        //     } else {
        //         return response()->json('error');
        //     }
        // }
        
        // return response()->json($req->file('file'));
        // $file3name = '';
        // $file3path = '';
        // $file4name = '';
        // $file4path = '';
        // // file3
        // if($req->hasFile('file3')){
        //     $file3 = $req->file('file3');
        //     $fileCON3 = $file3->getClientOriginalName();
        //     $file3name = pathinfo($fileCON3, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON3, PATHINFO_EXTENSION);
        //     $folder = 'post2';
        //     $file3path = Storage::putFileAs($folder,$file3,$file3name);
        // }

        // // file4
        // if($req->hasFile('file4')){
        //     $file4 = $req->file('file4');
        //     $fileCON4 = $file4->getClientOriginalName();
        //     $file4name = pathinfo($fileCON4, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON4, PATHINFO_EXTENSION);
        //     $folder = 'post2';
        //     $file4path = Storage::putFileAs($folder,$file4,$file4name);
        // }

        // $post2 = new Post2;
        // $post2->post_id = $req->post_id;
        // $post2->file3name = $file3name;
        // $post2->file3path = $file3path;
        // $post2->file4name = $file4name;
        // $post2->file4path = $file4path;
        // $post2->save();

        // $alert = [
        //     'alert_text' => 'ทำการบันทึกเรียบร้อยแล้ว',
        //     'alert_color' => 'success'
        // ];
        // return redirect()->back()->with($alert);
    
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
     

        // // file3
        // if($req->hasFile('file3')){
        //     $post2 = Post2::find($id);
        //     Storage::delete($post2->file3path);

        //     $file3 = $req->file('file3');
        //     $fileCON3 = $file3->getClientOriginalName();
        //     $file3name = pathinfo($fileCON3, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON3, PATHINFO_EXTENSION);
        //     $folder = 'post2';
        //     $file3path = Storage::putFileAs($folder,$file3,$file3name);

        //     $post2->file3name = $file3name;
        //     $post2->file3path = $file3path;
        //     $post2->save();
        // }

        // // file4
        // if($req->hasFile('file4')){
        //     $post2 = Post2::find($id);
        //     Storage::delete($post2->file4path);

        //     $file4 = $req->file('file4');
        //     $fileCON4 = $file4->getClientOriginalName();
        //     $file4name = pathinfo($fileCON4, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON4, PATHINFO_EXTENSION);
        //     $folder = 'post2';
        //     $file4path = Storage::putFileAs($folder,$file4,$file4name);
            
        //     $post2->file4path = $file4path;
        //     $post2->file4name = $file4name;
        //     $post2->save();
        // }

        // $alert = [
        //     'alert_text' => 'ทำการบันทึกเรียบร้อยแล้ว',
        //     'alert_color' => 'success'
        // ];
        // return redirect()->back()->with($alert);
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
