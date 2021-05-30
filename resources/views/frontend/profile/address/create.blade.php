@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header">Addresses</div>
    <form action="{{route('frontend.addresses.create')}}">
        <div class="card-body">
            @include('frontend.profile.address.form')
        </div>
        <div class="card-footer">
            <button class="btn btn-buy-now w-auto">Save</button>
        </div>
    </form>
</div>
@endsection
