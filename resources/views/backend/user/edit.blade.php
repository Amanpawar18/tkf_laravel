@extends('backend.layout.master')
@section('content')
@php
use App\Models\User;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Users</a></li>
                        <li class="breadcrumb-item active">Edit {{$user->first_name}}</a></li>
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
                            <h3 class="card-title">Edit {{$user->first_name}} Detail</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input id="name" type="text" required name="name" class="form-control"
                                                value="{{$user->name ?? old('first_name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" required name="email" class="form-control"
                                                value="{{$user->email ?? old('email')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="{{User::ACTIVE}}"
                                                    {{ $user->status == User::ACTIVE ? 'selected' : '' }}>
                                                    ACTIVE</option>
                                                <option value=" {{User::HIDDEN}}"
                                                    {{ $user->status == User::HIDDEN ? 'selected' : '' }}>
                                                    HIDDEN</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">Go
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
