<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Post3;
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

        if($post3->count() == 0){
            $titles = [
                '1. แบบคำขอรับการพิจารณากำหนดตำแหน่งทางวิชาการ (ก.พ.อ. 03)',
                '2. สำเนาหลักฐานการเผยแพร่ผลงานทางวิชาการ ตามหลักเกณฑ์ที่ ก.พ.อ. กำหนด',
                '3. ตารางสอนย้อนหลัง 3 ปีการศึกษา พร้อมตารางสอนภาคเรียนปัจจุบัน',
                '4. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น',
                '5. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการและจริยธรรมและจรรยาบรรณทางวิชาการ',
                '6. แบบแสดงหลักฐานการมีส่วนร่วมในผลงานทางวิชาการ',
                '7. หนังสือรับรองจริยธรรมและจรรยาบรรณทางวิชาการ',
                '8. หนังสือรับรองการเผยแพร่ผลงานทางวิชาการ',
                '9. หนังสือรับรองผลงานทางวิชาการ',
                '10. หนังสือรับรองวารสารทางวิชาการ สำหรับการเผยแพร่ผลงานทางวิชาการ',
                '11. เอกสารประกอบการสอน/เอกสารคำสอน',
                '12. สำเนาหน้าปก วิทยานิพนธ์ ระดับปริญญาโท ระดับปริญญาเอก',
            ]; 
            foreach ($titles as $title) {
                $post3 = new Post3;
                $post3->post_id = $id;
                $post3->title = $title;
                $post3->save();
            }
            
            $post3 = Post3::where('post_id',$id)->get();
        } 

        $data = [
            'post3' => $post3,
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
        $post3 = Post3::find($id);
        Storage::delete($post3->file_path);

        $file = $req->file('file');
        $fileCON = $file->getClientOriginalName();
        $file_name = pathinfo($fileCON, PATHINFO_FILENAME) . '_' . time() . '.' . pathinfo($fileCON, PATHINFO_EXTENSION);
        $folder = 'post3';
        $file_path = Storage::putFileAs($folder,$file,$file_name);

        $post3->file_name = $file_name;
        $post3->file_path = $file_path;
        if($post3->save()){
            $post = Post::find($req->post_id);
            $post3 = Post3::where('post_id', $req->post_id)->whereNotNull('file_name')->get();
            if($post3->count() == 12){
                $post->step3 = '1';
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
