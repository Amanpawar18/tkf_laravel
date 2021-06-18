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
                        <li class="breadcrumb-item"><a href="{{route('admin.request-withdrawal.index')}}">Request
                                Withdrawal</a></li>
                        <li class="breadcrumb-item active">View</a></li>
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
                            <h3 class="card-title">Request Withdrawal</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-2">
                                    <label>User :</label>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('admin.user.show',$requestWithdrawal->user->id)}}" target="_blank">
                                        {{$requestWithdrawal->user->name}}
                                    </a>
                                </div>

                                <div class="col-md-2">
                                    <label>Amount :</label>
                                </div>
                                <div class="col-md-4">
                                    ₹{{$requestWithdrawal->amount}}
                                </div>

                                <div class="col-md-2">
                                    <label>Reqeust Status :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$requestWithdrawal->status_text}}
                                </div>

                                <div class="col-md-2">
                                    <label>Bank Name :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$requestWithdrawal->bank_name}}
                                </div>

                                <div class="col-md-2">
                                    <label>Acc Holder Name :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$requestWithdrawal->acc_holder_name}}
                                </div>

                                <div class="col-md-2">
                                    <label>Acc Number :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$requestWithdrawal->acc_number}}
                                </div>

                                <div class="col-md-2">
                                    <label>Ifsc Code :</label>
                                </div>
                                <div class="col-md-4">
                                    {{$requestWithdrawal->ifsc_code}}
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-brequestWithdrawaled">
                                            <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th>Amount</th>
                                                    <th>Message</th>
                                                    <th>Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($requestWithdrawal->user->transactions as $key =>
                                                $transaction)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $transaction->amount  }}</td>
                                                    <td>{{ Str::limit($transaction->message, 40) }}</td>
                                                    <td>{{ $transaction->type_text }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" align="center">No transaction found</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{route('admin.request-withdrawal.index')}}" class="btn btn-primary">Go
                                        Back</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
