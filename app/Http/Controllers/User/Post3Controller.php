<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post3;
use App\PostComment;
use Storage;

class Post3Controller extends Controller
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
        function saveFile($file){
            $fileCON = $file->getClientOriginalName();
            $filename = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
            $folder = 'post3';
            $filepath = Storage::putFileAs($folder,$file,$filename);
            return [
               'filename' => $filename,
               'filepath' => $filepath
            ];
        }

        $post3 = new Post3;
        $post3->post_id = $req->post_id;
        $post3->status = 'ยังไม่ได้รับการตรวจสอบ';

         // file1
        if($req->hasFile('file1')){
            $file = saveFile($req->file('file1'));
            $post3->file1name = $file['filename'];
            $post3->file1path = $file['filepath'];
        }
        // file2
        if($req->hasFile('file2')){
            $file = saveFile($req->file('file2'));
            $post3->file2name = $file['filename'];
            $post3->file2path = $file['filepath'];
        }
        // file3
        if($req->hasFile('file3')){
            $file = saveFile($req->file('file3'));
            $post3->file3name = $file['filename'];
            $post3->file3path = $file['filepath'];
        }
        // file4
        if($req->hasFile('file4')){
            $file = saveFile($req->file('file4'));
            $post3->file4name = $file['filename'];
            $post3->file4path = $file['filepath'];
        }
        // file5
        if($req->hasFile('file5')){
            $file = saveFile($req->file('file5'));
            $post3->file5name = $file['filename'];
            $post3->file5path = $file['filepath'];
        }
        // file6
        if($req->hasFile('file6')){
            $file = saveFile($req->file('file6'));
            $post3->file6name = $file['filename'];
            $post3->file6path = $file['filepath'];
        }
        // file7
        if($req->hasFile('file7')){
            $file = saveFile($req->file('file7'));
            $post3->file7name = $file['filename'];
            $post3->file7path = $file['filepath'];
        }
        // file8
        if($req->hasFile('file8')){
            $file = saveFile($req->file('file8'));
            $post3->file8name = $file['filename'];
            $post3->file8path = $file['filepath'];
        }
        // file9
        if($req->hasFile('file9')){
            $file = saveFile($req->file('file9'));
            $post3->file9name = $file['filename'];
            $post3->file9path = $file['filepath'];
        }
        // file10
        if($req->hasFile('file10')){
            $file = saveFile($req->file('file10'));
            $post3->file10name = $file['filename'];
            $post3->file10path = $file['filepath'];
        }
        //file11
        if($req->hasFile('file11')){
            $file = saveFile($req->file('file11'));
            $post3->file11name = $file['filename'];
            $post3->file11path = $file['filepath'];
        }
        // file12
        if($req->hasFile('file12')){
            $file = saveFile($req->file('file12'));
            $post3->file12name = $file['filename'];
            $post3->file12path = $file['filepath'];
        }

        $post3->save();
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
        $post3 = Post3::where('post_id',$id)->get();
        $postcomments = PostComment::where('post_id',$id)->orderBy('created_at','asc')->get();
        $data = [
            'post_id' => $id,
            'post3' => $post3,
            'postcomments' => $postcomments
        ];
        return view('user.post3.show')->with($data);  
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
        function saveFile($file,$oldFile){
            Storage::delete($oldFile);
            $fileCON = $file->getClientOriginalName();
            $filename = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
            $folder = 'post3';
            $filepath = Storage::putFileAs($folder,$file,$filename);
            return [
               'filename' => $filename,
               'filepath' => $filepath
            ];
        }

        $post3 = Post3::find($id);

         // file1
        if($req->hasFile('file1')){
            $file = saveFile($req->file('file1'),$post3->file1path);
            $post3->file1name = $file['filename'];
            $post3->file1path = $file['filepath'];
        }
        // file2
        if($req->hasFile('file2')){
            $file = saveFile($req->file('file2'),$post3->file2path);
            $post3->file2name = $file['filename'];
            $post3->file2path = $file['filepath'];
        }
        // file3
        if($req->hasFile('file3')){
            $file = saveFile($req->file('file3'),$post3->file3path);
            $post3->file3name = $file['filename'];
            $post3->file3path = $file['filepath'];
        }
        // file4
        if($req->hasFile('file4')){
            $file = saveFile($req->file('file4'),$post3->file4path);
            $post3->file4name = $file['filename'];
            $post3->file4path = $file['filepath'];
        }
        // file5
        if($req->hasFile('file5')){
            $file = saveFile($req->file('file5'),$post3->file5path);
            $post3->file5name = $file['filename'];
            $post3->file5path = $file['filepath'];
        }
        // file6
        if($req->hasFile('file6')){
            $file = saveFile($req->file('file6'),$post3->file6path);
            $post3->file6name = $file['filename'];
            $post3->file6path = $file['filepath'];
        }
        // file7
        if($req->hasFile('file7')){
            $file = saveFile($req->file('file7'),$post3->file7path);
            $post3->file7name = $file['filename'];
            $post3->file7path = $file['filepath'];
        }
        // file8
        if($req->hasFile('file8')){
            $file = saveFile($req->file('file8'),$post3->file8path);
            $post3->file8name = $file['filename'];
            $post3->file8path = $file['filepath'];
        }
        // file9
        if($req->hasFile('file9')){
            $file = saveFile($req->file('file9'),$post3->file9path);
            $post3->file9name = $file['filename'];
            $post3->file9path = $file['filepath'];
        }
        // file10
        if($req->hasFile('file10')){
            $file = saveFile($req->file('file10'),$post3->file10path);
            $post3->file10name = $file['filename'];
            $post3->file10path = $file['filepath'];
        }
        // file11
        if($req->hasFile('file11')){
            $file = saveFile($req->file('file11'),$post3->file11path);
            $post3->file11name = $file['filename'];
            $post3->file11path = $file['filepath'];
        }
        // file12
        if($req->hasFile('file12')){
            $file = saveFile($req->file('file12'),$post3->file12path);
            $post3->file12name = $file['filename'];
            $post3->file12path = $file['filepath'];
        }
        
        $post3->save();
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
        //
    }
}
