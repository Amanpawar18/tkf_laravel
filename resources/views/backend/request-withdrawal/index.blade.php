@extends('backend.layout.master')
@section('content')
@php
use App\Models\RequestWithdrawal;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Request Withdrawals</a></li>
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
                        <form action="" method="GET">
                            <div class="card-header">
                                <h3 class="card-title">Request Withdrawals</h3>
                                <div class="card-tools">
                                    <div class="input-group" style="">
                                        <select name="status" id="status" class="form-control">
                                            <option value="{{RequestWithdrawal::STATUS_PENDING}}"
                                                {{RequestWithdrawal::STATUS_PENDING == request()->status ? 'selected' : ''}}>
                                                Pending
                                            </option>
                                            <option value="{{RequestWithdrawal::STATUS_APPROVED}}"
                                                {{RequestWithdrawal::STATUS_APPROVED == request()->status ? 'selected' : ''}}>
                                                Approved
                                            </option>
                                            <option value="{{RequestWithdrawal::STATUS_PROCESSED}}"
                                                {{RequestWithdrawal::STATUS_PROCESSED == request()->status ? 'selected' : ''}}>
                                                Processed
                                            </option>
                                            <option value="{{RequestWithdrawal::STATUS_COMPLETED}}"
                                                {{RequestWithdrawal::STATUS_COMPLETED == request()->status ? 'selected' : ''}}>
                                                Completed
                                            </option>
                                            <option value="{{RequestWithdrawal::STATUS_DECLINE}}"
                                                {{RequestWithdrawal::STATUS_DECLINE == request()->status ? 'selected' : ''}}>
                                                Decline
                                            </option>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Amount</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse($requestWithdrawals as $request)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$request->amount}}</td>
                                        <td>{{$request->user->name}}</td>
                                        <td>{{$request->user->email}}</td>
                                        <td>{{$request->status_text}}</td>
                                        <td>
                                            <a href="{{ route('admin.request-withdrawal.edit', $request->id) }}">
                                                <button type="button" title="edit" class="btn btn-success btn-sm"><i
                                                        class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" align="center">
                                            No Data Found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if($requestWithdrawals->links())
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    {{$requestWithdrawals->links()}}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
