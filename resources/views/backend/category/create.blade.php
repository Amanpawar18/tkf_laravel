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
                        <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Category</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                            @if(Route::currentRouteName() == 'admin.subcategory.add')
                            <h3 class="card-title">Add Sub Category In {{$category->name}}</h3>
                            @else
                            <h3 class="card-title">Add Category</h3>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{route('admin.category.store')}}" name="form"
                            enctype="multipart/form-data">
                            @csrf
                            @include('backend.category.form')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.category.index') }}" class="btn btn-danger">
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
{{-- @if(Route::currentRouteName() != 'admin.subcategory.add')
<div class="col-md-6">
    <label class="" for="">Category Image</label>
    <div class="form-group custom-file">
        <input type="file" name="image" required class="custom-file-input"
            id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
</div>
@endif --}}
