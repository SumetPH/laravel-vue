<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Storage;

class ProfileController extends Controller
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
        $profile = User::find($id);
        return response()->json($profile);
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
        if($req->hasFile('image')){
            $file = $req->file('image');
            $fileCON = $file->getClientOriginalName();
            $folder = 'image';
            $path = Storage::putFileAs($folder,$file,$fileCON);
            $profile = User::find($id);
            $profile->image = $path;
            if($profile->save()){
                return response()->json([
                    'status' => 'success',
                    'data' => $profile
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'data' => $profile
                ]);
            }
        } else {
            $profile = User::find($id);
            $profile->title = $req->title;
            $profile->academic = $req->academic;
            $profile->firstname = $req->firstname;
            $profile->lastname = $req->lastname;
            $profile->education = $req->education;
            $profile->position = $req->position;
            $profile->branch = $req->branch;
            $profile->faculty = $req->faculty;
            $profile->number = $req->number;
            if($profile->save()){
                return response()->json([
                    'status' => 'success',
                    'data' => $profile
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'data' => $profile
                ]);
            }
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
