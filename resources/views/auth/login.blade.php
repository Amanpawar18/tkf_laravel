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
                        <button class="nav-link active" id="nav-login-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login"
                            aria-selected="true">Login</button>
                        <a class="nav-link text-dark" id="nav-register-tab" href="{{route('register')}}"
                            aria-selected="true">Register</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-login" role="tabpanel"
                        aria-labelledby="nav-login-tab">
                        <div class="row mb-3">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                <div class="col-md-12 text-danger">
                                    <p>{{session('error')}}</p>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <h5>
                                        Registered Clients
                                    </h5>
                                    <p>
                                        If you have an account with us, please login below.
                                    </p>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="email">Email*</label>
                                    <input id="email" name="email" type="email" value="{{old('email')}}" required=""
                                        class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="password">Password*</label>
                                    <input id="password" name="password" type="password" value="{{old('password')}}" required=""
                                        class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <button class="btn btn-buy-now btn-block" type="submit">
                                        Login
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
