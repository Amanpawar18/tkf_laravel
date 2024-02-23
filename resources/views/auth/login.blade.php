@extends('frontend.layout.master')
@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">Login</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="{{route('login')}}" method="post">
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
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input name="email" type="email" value="{{old('email')}}"
                                        class="form-control border-0" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input name="password" type="password" value="{{old('password')}}"
                                        class="form-control border-0" id="password" placeholder="****">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit">Sign In</button>
                            </div>
                            <div class="col-6 text-center">
                                <a href="{{route('password.request')}}" class="mt-3">Forgot Password</a>
                            </div>
                            <div class="col-6 text-center">
                                <a href="{{route('register')}}" class="mt-3">Sign Up</a>
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