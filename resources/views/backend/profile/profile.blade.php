@extends('backend.layout.master')
@section('content')
<style>
    .note-toolbar.card-header {
        background: white !important;
        background-color: white;
    }
</style>
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('admin.profile.update') }}" name="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Email-Id</label>
                                        <input type="email" name="email" value="{{Auth::guard('admin')->user()->email}}"
                                            class="form-control">
                                        <small class="text-danger">{{$errors->first('email')}}</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Current Password</label>
                                        <input type="password" name="current_password" value="" autocomplete="off"
                                            class="form-control">
                                        <small class="text-danger">{{$errors->first('current_password')}}</small>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">New Password</label>
                                        <input type="password" name="password" value="" autocomplete="off"
                                            class="form-control">
                                        <small class="text-danger">{{$errors->first('password')}}</small>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Confirmation Password</label>
                                        <input type="password" name="password_confirmation" value="" autocomplete="off"
                                            class="form-control">
                                        <small class="text-danger">{{$errors->first('password_confirmation')}}</small>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">
                                    <i class="fa fa-times-circle"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
