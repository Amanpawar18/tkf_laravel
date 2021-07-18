@extends('backend.layout.master')
@section('content')
@php
use App\Models\Setting as SettingModel;
@endphp
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</a></li>
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
                            <h3 class="card-title">Tds Settings</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <form action="{{route('admin.tds.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body row">

                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Tds Percent</label>
                                    <input type="text" value="{{ Setting::get('tds_percent') }}" name="tds_percent"
                                        class="form-control">
                                </div>

                                <div class="col-md-6 my-2">
                                    <label class="text-capitalize">Tds Period</label>
                                    <select name="tds_period" id="tds_period" class="form-control">
                                        <option value="{{SettingModel::TDS_PERIOD_YEARLY}}" {{ Setting::get('tds_period') == SettingModel::TDS_PERIOD_YEARLY ||
                                            !Setting::get('tds_period') ? 'selected' : '' }}>
                                            Yearly
                                        </option>
                                        <option value="{{SettingModel::TDS_PERIOD_HALF_YEARLY}}"
                                            {{ Setting::get('tds_period') == SettingModel::TDS_PERIOD_HALF_YEARLY ? 'selected' : '' }}>
                                            Half-Yearly
                                        </option>
                                        <option value="{{SettingModel::TDS_PERIOD_QUARTERLY}}"
                                            {{ Setting::get('tds_period') == SettingModel::TDS_PERIOD_QUARTERLY ? 'selected' : '' }}>
                                            Quarterly
                                        </option>
                                        <option value="{{SettingModel::TDS_PERIOD_MONTHLY}}"
                                            {{ Setting::get('tds_period') == SettingModel::TDS_PERIOD_MONTHLY ? 'selected' : '' }}>
                                            Monthly
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
