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
                        <li class="breadcrumb-item"><a href="{{route('admin.tds-report.index')}}">Tds Reports</a></li>
                        <li class="breadcrumb-item active">Add Tds Report</a></li>
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
                            <h3 class="card-title">Tds Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{route('admin.tds-report.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('backend.tds-report.form')
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{route('admin.tds-report.index')}}" class="btn btn-primary btn-sm">Go
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
</div>
</section>
</div>
@endsection
