@extends('layouts.argon')

{{-- @section('header-color','success') --}}
@section('title-text','หน้าแรก')

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
                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">คำร้องขอทั้งหมด</h5> --}}
                            <span class="h2 font-weight-bold mb-0">{{ $posts->count() }} รายการ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">Since last month</span>
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
                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">คำร้องขอที่รอการตรวจสอบ</h5>
                            --}}
                            <span class="h2 font-weight-bold mb-0">{{ $posts_checking->count() }} รายการ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                <i class="fas fa-percent"></i>
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
                    <h4 class="card-title text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- <h5 class="card-title text-uppercase text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h5>
                            --}}
                            <span class="h2 font-weight-bold mb-0">{{ $posts_checked->count() }} รายการ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                <i class="fas fa-chart-pie"></i>
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
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-9 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title text-muted mb-0">คำร้องขอที่รอการตรวจสอบ</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>หัวข้อ</th>
                                <th>ผู้ส่ง</th>
                                <th>เวลา</th>
                                <th>สถานะ</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts_checking as $post)
                            <tr>
                                <td><a href="/user/post/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user->firstname }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    @if ($post->step1 == 'ผ่านการตรวจสอบแล้ว' && $post->step3 == 'ผ่านการตรวจสอบแล้ว')
                                    ผ่านการตรวจสอบแล้ว
                                    @else
                                    กำลังดำเนินการ
                                    @endif
                                </td>
                                <td>
                                    <form action="/user/post/{{$post->id}}" method="post" onclick="return confirm('คุณต้องการลบคำร้องขอนี้ใช่หรือไม่')">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-sm ">ลบคำร้องขอ</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title text-muted mb-0">สำหรับบุคลากร</h4>
            </div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <button type="button" class="btn btn-primary btn-block animated pulse delay-1s" data-toggle="modal" data-target="#myModal">
                    เพิ่มคำร้องขอ
                </button>
               
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-12 mb-5 mb-xl-0">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>หัวข้อ</th>
                                <th>ผู้ส่ง</th>
                                <th>เวลา</th>
                                <th>สถานะ</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts_checked as $post)
                            <tr>
                                <td><a href="/user/post/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user->firstname }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    @if ($post->step1 == 'ผ่านการตรวจสอบแล้ว' && $post->step3 == 'ผ่านการตรวจสอบแล้ว')
                                    ผ่านการตรวจสอบแล้ว
                                    @else
                                    กำลังดำเนินการ
                                    @endif
                                </td>
                                <td>
                                    <form action="/user/post/{{$post->id}}" method="post" onclick="return confirm('คุณต้องการลบคำร้องขอนี้ใช่หรือไม่')">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-sm ">ลบคำร้องขอ</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">คำร้องขอ</h4>
                </div>
                <form action="/user/post" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                        <div class="form-group">
                            <label for="title">หัวข้อ</label>
                            <input type="text" class="form-control" name="title" value="ขอแต่งตั้งผู้ทรงคุณวุฒิภายนอก"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">รายละเอียด</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">ฟอร์มบันทึกข้อความ</label>
                            <input id="file" class="form-control" type="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ส่ง</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection