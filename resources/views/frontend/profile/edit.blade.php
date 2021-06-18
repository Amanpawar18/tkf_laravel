@extends('frontend.profile.layout')
@section('profile-content')
<div class="row">
    <div class="col-md-12 text-danger">
        <p>{{session('error')}}</p>
        <p class="text-success">{{session('status')}}</p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                General Details
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8 mx-auto">
                        <form method="POST" action="{{ route('frontend.profile.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Name*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="name" name="name" type="text" required="" value="{{$user->name}}"
                                        class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="phone_no">Phone*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="phone_no" name="phone_no" type="tel" required=""
                                        value="{{$user->phone_no}}" class="form-control">
                                </div>
                                <div class="col-md-12 text-right mb-3">
                                    <button class="btn btn-buy-now w-auto btn-block" type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                Update Password
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8 mx-auto">
                        <form method="POST" action="{{ route('frontend.profile.updatePassword') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">Current Password*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="name" name="current_password" type="password" required=""
                                        class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="name">New Password*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="name" name="password" type="password" required="" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="name">Confirm Password*</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="name" name="password_confirmation" type="password" required=""
                                        class="form-control">
                                </div>
                                <div class="col-md-12 text-right mb-3">
                                    <button class="btn btn-buy-now w-auto btn-block" type="submit">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
