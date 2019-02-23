@extends('layouts.argon')

@section('header-color','danger')

@section('title-text','ย้อนกลับ')
@section('title-link','/admin/post/'.$post_id)

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    @if ($post2->count() && $post2->first()->file3path && $post2->first()->file4path)
                    <h3 class="card-title mb-0" style="color: #2dce89">ขั้นตอนที่ 2</h3>
                    @else
                    <h3 class="card-title mb-0" style="color: #f5365c">ขั้นตอนที่ 2</h3>
                    @endif
                </div>
                <div class="card-body">
                    @if ($post2->count())
                    {{-- file3 --}}
                    <form method="post" enctype="multipart/form-data" action="/admin/post2/{{$post2->first()->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                        <div class="row">
                            <div class="col-md-9" @if (!$post2->first()->file3path) style="display: none;"@endif
                                id="file3">
                                <div class="form-group">
                                    <label for="file3">1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
                                    {{-- <a target="_blank" class="form-control" href="/files/{{$post2->first()->file3path}}">{{$post2->first()->file3name}}</a>
                                    --}}
                                    <br>
                                    เอกสาร : <a target="_blank" href="/files/{{$post2->first()->file3path}}">{{$post2->first()->file3name}}</a>
                                </div>
                                <button class="btn btn-warning" id="file3edit">แก้ไข</button>
                            </div>

                            <div class="col-md-9" @if ($post2->first()->file3path) style="display: none;" @endif
                                id="file3upload">
                                <div class="form-group">
                                    <label for="file3">1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
                                    <input type="file" name="file3" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">

                        {{-- file4 --}}
                        <div class="row">
                            <div class="col-md-9" @if (!$post2->first()->file4path) style="display: none;"@endif
                                id="file4">
                                <div class="form-group">
                                    <label for="file4">2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ</label>
                                    {{-- <a target="_b lank" class="form-control" href="/files/{{$post2->first()->file4path}}">{{$post2->first()->file4name}}</a>
                                    --}}
                                    <br>
                                    เอกสาร : <a target="_blank" href="/files/{{$post2->first()->file4path}}">{{$post2->first()->file4name}}</a>
                                </div>
                                <button class="btn btn-warning" id="file4edit">แก้ไข</button>
                            </div>

                            <div class="col-md-9" @if ($post2->first()->file4path) style="display: none;" @endif
                                id="file4upload">
                                <div class="form-group">
                                    <label for="file3">2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ</label>
                                    <input type="file" name="file4" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div id="btn_submit" @if ($post2->count() && $post2->first()->file3path &&
                            $post2->first()->file4path)
                            style="display:none" @endif>
                            <button class="btn btn-primary" type="submit">บันทึก</button>
                            <p></p>
                            <small style="color: red">* กรุณากดบันทึกทุกครั้งที่มีการแก้ไข</small>
                        </div>
                    </form>

                    @else
                    {{-- store --}}
                    <div class="row">
                        <div class="col-md-9">
                            <form method="post" enctype="multipart/form-data" action="/admin/post2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="post_id" value="{{ $post_id }}">
                                <div class="form-group">
                                    <label for="file3">1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
                                    <input type="file" name="file3" class="form-control">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="file4">2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ</label>
                                    <input type="file" name="file4" class="form-control">
                                </div>
                                <hr>
                                <button class="btn btn-primary" type="submit">บันทึก</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($post2->count() && $post2->first()->file3path && $post2->first()->file4path)
    <div class="row mt-5 justify-content-center">
        <div class="col-md-5">
            <a href="/admin/post3/{{$post_id}}" class="btn btn-primary btn-block">ขั้นตอนถัดไป >></a>
        </div>
    </div>
    @endif

    <div class="row mt-5">
        <div class="col-md-12">
            @include('inc.comment')
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#file3edit').click(function (e) {
                e.preventDefault();
                $("#file3").hide();
                $("#file3upload").show();
                $("#btn_submit").show();
                $("#submit_alert").show();
            });
            $('#file4edit').click(function (e) {
                e.preventDefault();
                $("#file4").hide();
                $("#file4upload").show();
                $("#btn_submit").show();
                $("#submit_alert").show();
            });
        });
    </script>
</div>
@endsection