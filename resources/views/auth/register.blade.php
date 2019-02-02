@extends('layouts.auth')

@section('header-color','success')

@section('what','สมัครสมาชิก')
@section('who','สำหรับบุคลากร')
    
@section('form')
<form  method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="form-group mb-3">
        <label for="firstname" class="control-label">ชื่อ</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="firstname" placeholder="ชื่อ" type="text" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="lastname" class="control-label">นามสกุล</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="lastname" placeholder="นามสกุล" type="text" required>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="email" class="control-label">อีเมล</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="email" placeholder="อีเมล" type="text" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="password" class="control-label">รหัสผ่าน</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="password" placeholder="รหัสผ่าน" type="password" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="password_confirmation" class="control-label">รหัสผ่าน (ยืนยัน)</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="password_confirmation" placeholder="รหัสผ่าน (ยืนยัน)" type="password" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="education" class="control-label">วุฒิ</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="education" placeholder="วุฒิ" type="text" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="position" class="control-label">ตำแหน่ง</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="position" placeholder="ตำแหน่ง" type="text" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="branch" class="control-label">สาขา</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="branch" placeholder="สาขา" type="text" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="faculty" class="control-label">คณะ</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></i></span>
            </div>
            <input class="form-control" name="faculty" placeholder="คณะ" type="text" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="university" class="control-label">มหาวิทยาลัย</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></span>
            </div>
            <input class="form-control" name="university" placeholder="มหาวิทยาลัย" type="text" value="มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="campus" class="control-label">วิทยาเขต</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></span>
            </div>
            <input class="form-control" name="campus" placeholder="วิทยาเขต" type="text" value="วิทยาเขตสกลนคร" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="number" class="control-label">เบอร์โทรศัพท์</label>
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"></span>
            </div>
            <input class="form-control" name="number" placeholder="เบอร์โทรศัพท์" type="text" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
    <button type="reset" class="btn btn-danger">ยกเลิก</button>
</form>
@endsection