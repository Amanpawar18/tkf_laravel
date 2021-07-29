@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Client Experience</a></li>
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
                            <h3 class="card-title">Client Experiences</h3>
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
                                        <th>Reviewer Name</th>
                                        <th>Reviewer Email</th>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Visiblity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($experiences as $experience)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$experience->user->name}}</td>
                                        <td>{{$experience->user->email}}</td>
                                        <td>{{$experience->product->name}}</td>
                                        <td>{{$experience->category->name}}</td>
                                        <td>
                                            <div
                                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" data-id="{{$experience->id}}"
                                                    data-url="{{ route('admin.client-experience.status', $experience->id) }}"
                                                    {{($experience->status == 1)? 'checked' : ''}}
                                                    class="update-status custom-control-input"
                                                    id="customSwitch{{$experience->id}}">
                                                <label class="custom-control-label"
                                                    for="customSwitch{{$experience->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.client-experience.destroy', $experience->id)}}"
                                                method="post">
                                                @csrf
                                                <a href="{{ route('admin.client-experience.show', $experience->id) }}">
                                                    <button type="button" title="view" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-eye"></i>
                                                    </button>
                                                </a>
                                                <button type="submit" title="delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this experience ?')">
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
                            {{$experiences->links()}}
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
