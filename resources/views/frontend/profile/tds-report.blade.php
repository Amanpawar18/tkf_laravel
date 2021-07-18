@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                Tds Transacation
            </div>
            <div class="col-md-6 text-right">
                <b>
                    Wallet Balance:
                </b>
                {{Auth::user()->wallet_balance_text}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <form action="">
                    <div class="input-group">
                        <input type="date" class="form-control" name="start_date" value="{{request()->start_date}}">
                        <button class="btn btn-secondary" disabled type="button">to</button>
                        <input type="date" class="form-control" name="end_date" value="{{request()->end_date}}">
                        <button class="btn btn-secondary d-block">Filter</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12 table-responsive mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Period</th>
                            <th class="text-right">Tds Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $key => $report)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td >{{ $report->period }}</td>
                            <td align="right">
                                <a href="{{$report->path}}" target="_blank">
                                    Download
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" align="center">No report found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{$reports->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
