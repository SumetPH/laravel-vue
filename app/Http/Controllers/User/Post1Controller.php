<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Post1;
use App\Post2;
use App\Post3;
use App\Comment;
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
        $fullName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $fullNameLength = strlen($fullName);
    	$extLength = strlen($ext) + 1;
        $onlyName = substr($fullName, 0, $fullNameLength - $extLength);
        $folder = 'post1';
        $file_name = $onlyName . '_' . time() . '.' . $ext;
        $file_path = Storage::putFileAs($folder, $file, $file_name);

        // add infomation to posts table
        $post = new Post;
        $post->user_id = $req->user_id;
        $post->save();

        $post1 = new Post1;
        $post1->post_id = $post->id;
        $post1->user_id = $req->user_id;
        $post1->academic = $req->academic;
        $post1->title = 'ขอแต่งตั้งผู้ทรงคุณวุฒิภายนอก';
        $post1->description = $req->description;
        $post1->file_path = $file_path;
        $post1->file_name = $file_name;

        if ($post1->save()) {
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
        $post1 = Post1::where('post_id', $id)->first();

        $data = [
            'post' => $post,
            'post1' => $post1,
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
        return view('user.post.edit')->with('post', $post);
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
        $post = Post1::where('post_id', $id)->first();

        if ($req->hasFile('file')) {
            // delete old file
            Storage::delete($post->file_path);

            // file
            $file = $req->file('file');
            $fileCON = $file->getClientOriginalName();
            $filename = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
            $folder = 'post';
            $path = Storage::putFileAs($folder, $file, $filename);
            $post->file_path = $path;
            $post->file_name = $filename;
        }

        $post->description = $req->description;

        if ($post->save()) {
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
        $post->delete();

        $post1 = Post1::find($id);
        if ($post1) {
            Storage::delete($post1->file_path);
            $post1->delete();
        }

        $post2 = Post2::where('post_id', $id)->get();
        if ($post2) {
            foreach ($post2 as $p2) {
                Storage::delete($p2->file_path);
            }
            Post2::where('post_id', $id)->delete();
        }

        $post3 = Post3::where('post_id', $id)->get();
        if ($post3) {
            foreach ($post3 as $p3) {
                Storage::delete($p3->file_path);
            }
            Post3::where('post_id', $id)->delete();
        }

        Comment::where('post_id', $id)->delete();

        return response()->json('success');
    }
}
