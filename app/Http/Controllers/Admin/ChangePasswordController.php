<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;
use Hash;

class ChangePasswordController extends Controller
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
        return view('admin.changepassword.index');
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
        if(Hash::check($req->old_password, Auth::user()->password)){
            $admin = Admin::find(Auth::user()->id);
            $admin->password = Hash::make($req->new_password);
            if($admin->save()){
                $alert = [
                    'alert_text' => 'ทำการเปลี่ยนรหัสผ่านเรียบร้อยแล้ว',
                    'alert_color' => 'success'
                ];
                return redirect()->back()->with($alert);
            } else {
                $alert = [
                    'alert_text' => 'การเปลี่ยนรหัสสผ่านไม่สำเร็จ',
                    'alert_color' => 'success'
                ];
                return redirect()->back()->with($alert);
            }
            
        } else {
            $alert = [
                'alert_text' => 'รหัสผ่านปัจจุบันของคุณไม่ถูกต้อง',
                'alert_color' => 'danger'
            ];
            return redirect()->back()->with($alert);
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
        //
    }
}
