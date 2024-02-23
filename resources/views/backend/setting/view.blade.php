@extends('backend.layout.master')
@section('content')
@php
use Illuminate\Support\Facades\Route;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form action="{{route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">

                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Website Name</label>
                                    <input type="text" value="{{ Setting::get('website_name') }}" name="website_name"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Website Email</label>
                                    <input type="email" value="{{ Setting::get('website_email') }}" name="website_email"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Website Logo</label>
                                    <div class="custom-file">
                                        <input type="file" value="{{ Setting::get('website_logo') }}"
                                            {{-- {{ Setting::get('website_logo') ? '' : 'required' }}  --}}
                                            name="website_logo"
                                            class="custom-file-input" id="website_logo">
                                        <label class="custom-file-label" for="website_logo">Choose
                                            file...</label>
                                    </div>
                                </div>
                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Footer Logo</label>
                                    <div class="custom-file">
                                        <input type="file" value="{{ Setting::get('footer_logo') }}" name="footer_logo"
                                            class="custom-file-input" id="footer_logo">
                                        <label class="custom-file-label" for="footer_logo">Choose
                                            file...</label>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <label class="text-capitalize">Facebook Link</label>
                                    <input type="text" value="{{ Setting::get('facebook_link') }}" name="facebook_link"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 my-2">
                                    <label class="text-capitalize">Youtube Link</label>
                                    <input type="text" value="{{ Setting::get('youtube_link') }}" name="youtube_link"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 my-2">
                                    <label class="text-capitalize">Instagram Link</label>
                                    <input type="text" value="{{ Setting::get('instagram_link') }}" name="instagram_link"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Mobile no</label>
                                    <input type="text" value="{{ Setting::get('mobile_no') }}" name="mobile_no"
                                        class="form-control">
                                </div>
                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Email</label>
                                    <input type="text" value="{{ Setting::get('email') }}" name="email"
                                        class="form-control">
                                </div>
                                <div class="col-md-12 my-2">
                                    <label class="text-capitalize">Adderss</label>
                                    <textarea class="form-control" name="address" id=" " cols="30"
                                        required rows="5">{{ Setting::get('address') }}</textarea>
                                </div>

                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
{{-- <div class="row">
                                    @foreach ($fields as $key => $value)
                                    <div class="col-md-6 my-2">
                                        <label class="text-capitalize">{{ str_replace("_"," ", $key )}}</label>
<input type="text" value="{{ $value }}" name="{{ $key }}" class="form-control">
</div>
@endforeach
</div> --}}
