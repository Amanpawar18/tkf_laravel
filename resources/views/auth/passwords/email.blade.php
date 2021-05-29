{{-- @extends('layouts.app') --}}
@extends('frontend.layout.master')

@section('content')
<section id="login" class="">
    <div class="container">
        <div class="form1 mt-5 col-sxs-12 col-sm-12 col-md-6 offset-md-3 my-5">
            <h3 class="fw-500 uppercase text-center"> Login </h3>
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

                <button type="submit" class="btn btn-buy-now">Submit</button>

                <a href="{{route('login')}}" class="login d-block text-center mt-3 text-dark fw-500">Cancel</a>

            </form>
        </div>
    </div>
</section>
@endsection
