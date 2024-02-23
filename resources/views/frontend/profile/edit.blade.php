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
<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card bg-light rounded p-4 p-sm-5 wow fadeInUp">
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
                                <div class="col-md-12 text-right align-items-right mb-3">
                                    <button class="btn btn-primary w-auto btn-block" type="submit">
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
        <div class="card bg-light rounded p-4 p-sm-5 wow fadeInUp">
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

{{-- <div class="row">
    <div class="col-md-12 mb-3">
        <div class="card bg-light rounded p-4 p-sm-5 wow fadeInUp">
            <div class="card-header bg-transparent">
                Additional Details
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8 mx-auto">
                        <form method="POST" action="{{ route('frontend.profile.additionalUpdate') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="pan_no">Pan No.</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="pan_no" name="pan_no" type="text" value="{{$user->pan_no}}" required
                                        class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pan_front_image">Pan Front Image</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="pan_front_image" name="pan_front_image" type="file"
                                        value="{{$user->pan_front_image}}" {{$user->pan_front_image ? '' : 'required'}}
                                        class="form-control">
                                    <small>
                                        <a href="{{$user->pan_front_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </small>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pan_back_image">Pan Back Image</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="pan_back_image" name="pan_back_image" type="file"
                                        value="{{$user->pan_back_image}}" {{$user->pan_back_image ? '' : 'required'}}
                                        class="form-control">
                                    <small>
                                        <a href="{{$user->pan_back_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </small>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pan_no">Aadhaar No.</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="aadhaar_no" name="aadhaar_no" type="text" value="{{$user->aadhaar_no}}"
                                        required class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="aadhaar_front_image">Aadhaar Front Image</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="aadhaar_front_image" name="aadhaar_front_image" type="file"
                                        value="{{$user->aadhaar_front_image}}"
                                        {{$user->aadhaar_front_image ? '' : 'required'}} class="form-control">
                                    <small>
                                        <a href="{{$user->aadhaar_front_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </small>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="aadhaar_back_image">Aadhaar Back Image</label>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <input id="aadhaar_back_image" name="aadhaar_back_image" type="file"
                                        value="{{$user->aadhaar_back_image}}"
                                        {{$user->aadhaar_back_image ? '' : 'required'}} class="form-control">
                                    <small>
                                        <a href="{{$user->aadhaar_front_image_path}}" target="_blank">Click here to see
                                            image</a>
                                    </small>
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
</div> --}}
@endsection
