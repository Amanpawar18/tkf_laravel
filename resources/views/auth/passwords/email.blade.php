{{-- @extends('layouts.app') --}}
@extends('frontend.layout.master')

@section('content')
<section id="login" class="">
    <div class="container">
        <div class="form1 mt-5 col-sxs-12 col-sm-12 col-md-6 offset-md-3">
            <h3 class="fw-500 uppercase text-center"> login </h3>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <h4 class="fw-100 text-center"> Reset your password </h4>

                <div class="form-group mb-4">

                    <label for="exampleInputEmail1">Email address</label>

                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                        aria-describedby="emailHelp">

                    <div class="small text-danger">
                        {{$errors->first('email')}}
                    </div>

                    <small id="emailHelp" class="form-text text-muted">
                        We'll never share your email with anyone
                        else.
                    </small>

                </div>

                <button type="submit" class="btn bg-dark btn-block">Submit</button>

                <a href="{{route('login')}}" class="login d-block text-center mt-3 text-dark fw-500">Cancel</a>

            </form>
        </div>
    </div>
</section>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
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
