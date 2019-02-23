@extends('layouts.auth')

@section('header-color','danger')
@section('what','เข้าสู่ระบบ')
@section('who','สำหรับผู้ดูแล')

@section('form')
<form role="form" action="/admin/login" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
            </div>
            <input class="form-control" name="username" placeholder="ชื่อผู้ใช้" type="text" required>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input class="form-control" name="password" placeholder="รหัสผ่าน" type="password" required>
        </div>
    </div>
    {{-- <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
        <label class="custom-control-label" for=" customCheckLogin">
        <span class="text-muted">Remember me</span>
        </label>
    </div> --}}
    <div class="text-center">
        <button type="submit" class="btn btn-primary my-4">เข้าสู่ระบบ</button>
    </div>
</form>
@endsection