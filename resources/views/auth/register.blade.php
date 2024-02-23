@extends('frontend.layout.master')
@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Register</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="{{route('register')}}" method="post">
                        @csrf
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
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="name" type="text" value="{{old('name')}}" class="form-control border-0"
                                        id="name" placeholder="Your name">
                                    <label for="name">Your name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="email" type="email" value="{{old('email')}}"
                                        class="form-control border-0" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="phone_no" type="tel" value="{{old('phone_no')}}"
                                        class="form-control border-0" id="phone_no" placeholder="+91-****">
                                    <label for="phone_no">Your phone_no</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="referrer_user_code" {{request()->referrer_user_code ? 'readonly' : ''}}
                                    type="text" value="{{old('referrer_user_code')}}" class="form-control border-0"
                                    id="referrer_user_code" value="{{request()->referrer_user_code ??
                                    old('referrer_user_code')}}"
                                    placeholder="+91-****">
                                    <label for="referrer_user_code">Your referrer code</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="password" type="password" value="{{old('password')}}"
                                        class="form-control border-0" id="password" placeholder="****">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input name="password_confirmation" type="password" value="{{old('password_confirmation')}}"
                                        class="form-control border-0" id="password confirmation" placeholder="****">
                                    <label for="password_confirmation">Confirm password</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('additional-js')
@endsection