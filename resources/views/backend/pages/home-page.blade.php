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
                        <li class="breadcrumb-item active">Edit Home Page</li>
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
                            <h3 class="card-title">Edit Home Page Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('admin.home-page.update') }}" name="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                {{-- Section-meta Start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>
                                            <u>
                                                Section-Meta Details
                                            </u>
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control"
                                                value="{{isset($homePageData->meta_title)? $homePageData->meta_title : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" class="form-control"
                                                value="{{isset($homePageData->meta_keywords)? $homePageData->meta_keywords : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta description</label>
                                            <input type="text" name="meta_description" class="form-control"
                                                value="{{isset($homePageData->meta_description)? $homePageData->meta_description : ''}}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Section-meta End --}}

                                {{-- Section-1 Start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>
                                            <u>
                                                Section-1
                                            </u>
                                        </h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Header Video Url</label>
                                            <input type="text" name="header_video_url" class="form-control"
                                                value="{{isset($homePageData->header_video_url)? $homePageData->header_video_url : ''}}">
                                                <small>
                                                    Use embed url
                                                </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Section one heading</label>
                                            <input type="text" name="section_one_heading" class="form-control"
                                                value="{{isset($homePageData->section_one_heading)? $homePageData->section_one_heading : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Section one heading description</label>
                                            <input type="text" name="section_one_heading_description" class="form-control"
                                                value="{{isset($homePageData->section_one_heading_description)? $homePageData->section_one_heading_description : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Read more link ..</label>
                                            <input type="text" name="read_more_link" class="form-control"
                                                value="{{isset($homePageData->read_more_link)? $homePageData->read_more_link : ''}}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Section-1 End --}}

                                {{-- Section-2 Start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>
                                            <u>
                                                Section-2
                                            </u>
                                        </h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Section two heading</label>
                                            <input type="text" name="section_two_heading" class="form-control"
                                                value="{{isset($homePageData->section_two_heading)? $homePageData->section_two_heading : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Section two heading description</label>
                                            <input type="text" name="section_two_heading_description" class="form-control"
                                                value="{{isset($homePageData->section_two_heading_description)? $homePageData->section_two_heading_description : ''}}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Section-2 End --}}

                                {{-- Section-3 Start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>
                                            <u>
                                                Section-3
                                            </u>
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Section three heading</label>
                                            <input type="text" name="section_three_heading" class="form-control"
                                                value="{{isset($homePageData->section_three_heading)? $homePageData->section_three_heading : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Section three image</label>
                                            <div class="custom-file">
                                                <input type="file" name="section_three_image"
                                                    {{isset($homePageData->section_three_image) ? "" : "required" }}
                                                    class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Section-3 End --}}

                                {{-- Section-4 Start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>
                                            <u>
                                                Section-4,5,6
                                            </u>
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Section four heading</label>
                                            <input type="text" name="section_four_heading" class="form-control"
                                                value="{{isset($homePageData->section_four_heading)? $homePageData->section_four_heading : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Section five Image (Referral Image)</label>
                                            <div class="custom-file">
                                                <input type="file" name="section_five_image"
                                                    {{isset($homePageData->section_five_image) ? "" : "required" }}
                                                    class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Section six Image one</label>
                                            <div class="custom-file">
                                                <input type="file" name="section_six_image_one"
                                                    {{isset($homePageData->section_six_image_one) ? "" : "required" }}
                                                    class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Section six Image two</label>
                                            <div class="custom-file">
                                                <input type="file" name="section_six_image_two"
                                                    {{isset($homePageData->section_six_image_two) ? "" : "required" }}
                                                    class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Section-4 End --}}

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
