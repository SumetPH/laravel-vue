@extends('layouts.argon')

@section('title-text','หน้าแรก')

@section('header-color','danger')

@section('card')
<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-header">
                    <h4 class="card-title text-muted mb-0">คำร้องขอทั้งหมด</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">คำขอที่ผ่านการตรวจสอบแล้ว</h5>
                            --}}
                            <span class="h2 font-weight-bold mb-0">{{ $posts->count() }} รายการ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p> --}}
                </div>
            </div>
        </div>

             <div class="col-xl-4">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-header">
                    <h4 class="card-title text-muted mb-0">คำร้องขอที่รอการตรวจสอบ</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">ผู้ใช้งานที่ได้รับการยืนยันแล้ว</h5>
                            --}}
                            <span class="h2 font-weight-bold mb-0">{{ $posts_checking->count() }} รายการ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                <i class="fas fa-tag"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span class="text-nowrap">Since yesterday</span>
                    </p> --}}
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-header">
                    <h4 class="card-title text-muted mb-0">คำขอที่ผ่านการตรวจสอบแล้ว</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">คำขอที่ผ่านการตรวจสอบแล้ว</h5>
                            --}}
                            <span class="h2 font-weight-bold mb-0">{{ $posts_checked->count() }} รายการ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                        <span class="text-nowrap">Since last week</span>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title text-muted mb-0">คำร้องขอที่รอการตรวจสอบ</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="thead-light">
                            <tr>
                                <th>หัวข้อ</th>
                                <th>ผู้ส่ง</th>
                                <th>เวลา</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts_checking as $post)
                            <tr>
                                <td><a href="/admin/post/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>
                                    <a href="/admin/user/{{$post->user->id}}">{{ $post->user->firstname }}</a>
                                </td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    @if ($post->step1 == 'ผ่านการตรวจสอบแล้ว' && $post->step3 == 'ผ่านการตรวจสอบแล้ว')
                                    ผ่านการตรวจสอบแล้ว  
                                    @else
                                    กำลังดำเนินการ
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card shadow mt-5">
            <div class="card-header">
                <h3 class="card-title text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="thead-light">
                            <tr>
                                <th>หัวข้อ</th>
                                <th>ผู้ส่ง</th>
                                <th>เวลา</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts_checked as $post)
                            <tr>
                                <td><a href="/admin/post/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>
                                    <a href="/admin/user/{{$post->user->id}}">{{ $post->user->firstname }}</a>
                                </td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    @if ($post->step1 == 'ผ่านการตรวจสอบแล้ว' && $post->step3 == 'ผ่านการตรวจสอบแล้ว')
                                    ผ่านการตรวจสอบแล้ว  
                                    @else
                                    กำลังดำเนินการ
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-header">
                <h4 class="card-title text-muted mb-0">ผู้ใช้งานที่ได้รับการยืนยันแล้ว</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        {{-- <h5 class="card-title text-uppercase text-muted mb-0">ผู้ใช้งานที่ได้รับการยืนยันแล้ว</h5>
                        --}}
                        <span class="h2 font-weight-bold mb-0">{{ $users_confirm->count() }} คน</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-stats mt-4 mb-4 mb-xl-0">
            <div class="card-header">
                <h4 class="card-title text-muted mb-0">ผู้ใช้งานที่ยังไม่ได้รับการยืนยัน</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        {{-- <h5 class="card-title text-uppercase text-muted mb-0">ผู้ใช้งานที่ยังไม่ได้รับการยืนยัน</h5>
                        --}}
                        <span class="h2 font-weight-bold mb-0">{{ $users_new->count() }} คน</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fas fa-percent"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection