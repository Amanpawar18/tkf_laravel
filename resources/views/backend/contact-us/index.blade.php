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
                        <li class="breadcrumb-item active">Contact Us</a></li>
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
                            <h3 class="card-title">Leads</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($leads as $lead)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$lead->name}}</td>
                                        <td>
                                            {{$lead->email}}
                                        </td>
                                        <td>
                                            {{$lead->phone_no}}
                                        </td>
                                        <td>
                                            <form action="{{route('admin.contactUs.destroy', $lead->id)}}"
                                                method="post">
                                                @csrf
                                                <a href="{{ route('admin.contactUs.view', $lead->id) }}">
                                                    <button type="button" title="view" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-eye"></i>
                                                    </button>
                                                </a>
                                                <button type="submit" title="delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this lead ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{$leads->links()}}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
{{-- <a href="{{ route('admin.category.show', $category->id) }}">
<button type="button" title="view" class="btn btn-success btn-sm"><i class="fas fa-eye"></i>
</button>
</a> --}}
