@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Login</h4>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <form action="" class="col-md-10 mt-4">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        
    </div>

@endsection

@section('script')
<script>
        $(document).ready(function(){
            console.log('test')
            $('.main-panel').css({'float' : 'left','position': 'static','width': '100%'})
        })
    </script>
@endsection