@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tds Transactions</a></li>
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
                                <h3 class="card-title">Tds Transactions</h3>
                                <div class="card-tools">
                                    <div class="input-group" style="">
                                        <input list="users" name="user_email" id="user_email" class="form-control"
                                            value="{{request()->user_email}}">
                                        <datalist id="users">
                                            @foreach ($users as $user)
                                            <option value="{{$user->email}}">
                                                {{$user->name}}
                                            </option>
                                            @endforeach
                                        </datalist>
                                        <input type="date" class="form-control" name="start_date"
                                            value="{{request()->start_date}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" disabled type="button">to</button>
                                        </div>
                                        <input type="date" class="form-control" name="end_date"
                                            value="{{request()->end_date}}">
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
                                        <th>Period</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse($transactions as $tds)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>₹ {{$tds->amount}}</td>
                                        <td>{{$tds->user->name}}</td>
                                        <td>{{$tds->user->email}}</td>
                                        <td>{{$tds->period}}</td>
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
                        @if($transactions->links())
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    {{$transactions->appends(request()->all())->links()}}
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
