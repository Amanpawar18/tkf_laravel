@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Experiences</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Experiences</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{route('admin.client-experience.update', $clientExperience->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PATCh')
                            @csrf
                            <div class="card-body">
                                @include('backend.client-experience.form')
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{route('admin.client-experience.index')}}" class="btn btn-primary btn-sm">Go
                                            Back</a>
                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@endsection
