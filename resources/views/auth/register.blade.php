@extends('frontend.layout.master')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-12 col-lg-12 text-center">
            <h2>
                Sign In
            </h2>
            <hr>
        </div>
        <div class="col-sm-8 col-md-6 col-lg-5">
            <div class="row col-md-12 mb-2">
                <nav>
                    <div class="nav nav-pills" id="nav-tab" role="tablist">
                        <a class="nav-link text-dark" id="nav-login-tab" href="{{route('login')}}"
                            aria-selected="true">Login</a>
                        <button class="nav-link active" id="nav-register-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register"
                            aria-selected="true">Register</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-register" role="tabpanel"
                        aria-labelledby="nav-register-tab">
                        <div class="row mb-3">
                            <div class="col-md-12 text-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-md-12 mb-2">
                                    <label for="name">Name*</label>
                                    <input id="name" name="name" type="text" required="" class="form-control" value="{{old('name')}}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="phone_no">Phone*</label>
                                    <input id="phone_no" name="phone_no" type="tel" required="" class="form-control" value="{{old('phone_no')}}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="referrer_user_code">Referral Code</label>
                                    <input id="referrer_user_code" name="referrer_user_code" type="text" autocomplete="off"
                                        {{request()->referrer_user_code ? 'readonly' : ''}}
                                        value="{{request()->referrer_user_code ?? old('referrer_user_code')}}" class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="email">Email*</label>
                                    <input id="email" name="email" type="email" required="" class="form-control" value="{{old('email')}}">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="password">Password*</label>
                                    <input id="password" name="password" type="password" required=""
                                        class="form-control">
                                    <small class="text-danger">Password has to be 8+ characters </small>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="password_confirmation">Confirm password*</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        required="" class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <button class="btn btn-buy-now btn-block" type="submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional-js')
@endsection
