@extends('layouts.argon')

@section('title-text','ย้อนกลับ') 
@section('title-link','/user/post/'.$post->id)   

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                    <form action="/user/post/{{ $post->id }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="title">หัวข้อ</label>
                            <input type="text" class="form-control" value="ขอแต่งตั้งผู้ทรงคุณวุฒิภายนอก" disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">รายละเอียด</label>
                            <textarea name="description" class="form-control" rows="8" >{{ $post->description }}</textarea>
                        </div>
                        <div>
                            <p>
                                แก้ไขฟอร์มบันทึกข้อความ : <input type="checkbox" id="editfile" name="editfile" value="checked">
                                <br>
                                <span id="old_file">ฟอร์มบันทึกข้อความ : <a href="/files/{{ $post->file }}">{{ $post->filename }}</a></span>
                            </p>
                            
                        </div>
                        <div class="form-group" id="new_file" style="display: none">
                            <label for="file">ฟอร์มบันทึกข้อความ</label>
                            <input class="form-control" type="file" id="file" name="new_file">
                        </div>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </form>
               </div>
           </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#editfile').change(function(){
            if($(this).is(':checked')){
                $('#old_file').hide()
                $('#new_file').show()
            } else {
                $('#old_file').show()
                $('#new_file').hide()
            }
        })
    });
</script>
@endsection