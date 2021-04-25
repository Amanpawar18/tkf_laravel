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
                        <li class="breadcrumb-item active">Product</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.product.create')}}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-plus"></i> Add Product</a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S.NO.</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Sale Price</th>
                                        <th>Regular Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key => $product)
                                    <tr>
                                        <td>
                                            {{$key + 1}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.show', $product->slug) }}">{{$product->name}}
                                            </a>
                                        </td>
                                        <td>
                                            @if(file_exists(public_path('frontend/uploads/product/'.$product->image))
                                            && is_file(public_path('frontend/uploads/product/'.$product->image)))
                                            <img src="{{asset('frontend/uploads/product/'.$product->image)}}"
                                                style="height: 100px; width: 100px;">
                                            @else
                                            <img src="{{asset('frontend/uploads/default_category.png')}}"
                                                style="height: 100px; width: 100px;">
                                            @endif
                                        </td>
                                        <td>{{ isset($product->category->name) ? $product->category->name : 'N/A' }}
                                        </td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>
                                            <div
                                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" data-id="{{$product->id}}"
                                                    data-url="{{ route('admin.product.status', $product->slug) }}"
                                                    {{($product->status == 1)? 'checked' : ''}}
                                                    class="update-status custom-control-input"
                                                    id="customSwitch{{$product->id}}">
                                                <label class="custom-control-label"
                                                    for="customSwitch{{$product->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.product.destroy', $product->slug)}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.product.edit', $product->slug) }}">
                                                    <button type="button" title="edit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.product-variation.index', $product->slug) }}">
                                                    <button type="button" title="Product Variations"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.product-benefit.index', $product->slug) }}">
                                                    <button type="button" title="Product Benefit"
                                                        class="btn btn-secondary btn-sm"><i
                                                            class="fas fa-plus-circle"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin.product-faq.index', $product->slug) }}">
                                                    <button type="button" title="Product faq"
                                                        class="btn btn-secondary btn-sm"><i
                                                            class="fas fa-question-circle"></i>
                                                    </button>
                                                </a>
                                                <button type="submit" title="delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this product ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" align="center">
                                            No Data found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    {{$products->links('pagination::bootstrap-4')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
