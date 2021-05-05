@extends('frontend.layout.master')
@section('content')

<!-- Slider -->
<section id="login" class="">
    <div class="container">
        <div class="form3 mt-5 col-sxs-12 col-sm-12 col-md-6 offset-md-3">
            <h3 class="fw-500 uppercase text-center"> Create Account </h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text"  value="{{old('name')}}" name="name" class="form-control" id="firstname" aria-describedby="emailHelp">
                    <div class="error small text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text"  value="{{old('last_name')}}" name="last_name" class="form-control" id="lastname" aria-describedby="emailHelp">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleInputEmail1">Email ID</label>
                    <input type="email"  value="{{old('email')}}" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <div class="error small text-danger">{{ $errors->first('email') }}</div>
                </div>
                <div class="form-group mb-5">
                    <label for="exampleInputPassword1">Password</label>

                    <input type="password"  value="{{old('password')}}" name="password" class="form-control" id="exampleInputPassword1">
                    <div class="error small text-danger">{{ $errors->first('password') }}</div>
                </div>

                <button type="submit" class="btn bg-dark btn-block">Create Account</button>

                <p class="text-center mt-3">Already have an account <a href="{{route('login')}}"
                        class="mt-3 text-dark fw-500">Sign In</a></p>

            </form>
        </div>
        <!-- reset password -->


    </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}

@endsection
