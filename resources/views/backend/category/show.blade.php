@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                <strong>{{(isset($categories) && count($categories))? $categories[0]->name: ''}}</strong>
                                Category Tree
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul>
                                        @foreach ($categories as $category)
                                        <li>{{ $category->name }}</li>
                                        <ul>
                                            @foreach ($category->childrenCategories as $childCategory)
                                            @include('backend.category.child_category_show', ['child_category' =>
                                            $childCategory])
                                            @endforeach
                                        </ul>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
