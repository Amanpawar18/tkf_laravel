@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header">Addresses</div>
    <form method="POST" action="{{route('frontend.address.update', $address->id)}}">
        @method('PATCh')
        @csrf
        <div class="card-body">
            @include('frontend.profile.address.form')
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-buy-now w-auto">Update</button>
        </div>
    </form>
</div>
@endsection
