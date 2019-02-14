<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Post2;
use App\Post3;
use App\Comment;
use Auth;
use Storage;

class Post1Controller extends Controller
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
        // file
        $file = $req->file('file');
        $fileCON = $file->getClientOriginalName();
        $filename = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
        $folder = 'post';
        $path = Storage::putFileAs($folder,$file,$filename);

        // add infomation to posts table
        $post = new Post;
        $post->academic= $req->academic;
        $post->title = 'ขอแต่งตั้งผู้ทรงคุณวุฒิภายนอก';
        $post->description = $req->description;
        $post->user_id = $req->user_id;
        $post->file_path = $path;
        $post->file_name = $filename;
        if($post->save()){
            return response()->json('success');
        } else {
            return response()->json('error');
        }
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

        $data = [
            'post' => $post,
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
        $post = Post::find($id);
        return view('user.post.edit')->with('post',$post);
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

        if($req->hasFile('file'))
        {
            // delete old file
            Storage::delete($post->file_path);

            // file
            $file = $req->file('file');
            $fileCON = $file->getClientOriginalName();
            $filename = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
            $folder = 'post';
            $path = Storage::putFileAs($folder,$file,$filename);
            $post->file_path = $path;
            $post->file_name = $filename;
        } 
        
        $post->description = $req->description;
        if($post->save()){
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
        $post = Post::find($id);
        if($post){
            Storage::delete($post->file_path);
            $post->delete();
        }
        
        $post2 = Post2::where('post_id',$id)->get();
        if($post2){
            foreach ($post2 as $p2) {
                Storage::delete($p2->file_path);
            }
            Post2::where('post_id',$id)->delete();   
        }

        $post3 = Post3::where('post_id',$id)->get();
        if($post3){
            foreach ($post3 as $p3) {
                Storage::delete($p3->file_path);
            }
            Post3::where('post_id',$id)->delete();    
        }
        
        Comment::where('post_id',$id)->delete();
            
        return response()->json('success');
    }
}
