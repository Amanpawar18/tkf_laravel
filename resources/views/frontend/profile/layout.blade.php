@extends('frontend.layout.master')
@section('content')
@php
use Illuminate\Support\Facades\Route;
$routeName =Route::currentRouteName();
@endphp
<div class="container-fluid py-5">
    <section class="">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-5">My Account</h1>
        </div>
        <div class="row position-relative" style="padding: 0px 12px;">
            <aside class="col-md-3" style="border-right: 1px solid green;">
                <ul class="list-group position-sticky" style="top:10px">
                    <a class="list-group-item {{ $routeName == 'frontend.profile.show' ? 'active' : '' }}"
                        href="{{route('frontend.profile.show')}}">
                        My account
                    </a>
                    <a class="list-group-item {{ $routeName == 'frontend.profile.orderHistory' ? 'active' : '' }}"
                        href="{{route('frontend.profile.orderHistory')}}">
                        Orders
                    </a>
                    <a class="list-group-item {{ $routeName == 'frontend.transactionIndex' ? 'active' : '' }}"
                        href="{{route('frontend.transactionIndex')}}">
                        Transactions
                    </a>
                    {{-- <a class="list-group-item {{ $routeName == 'frontend.request-withdrawal.index' ? 'active' : '' }}"
                        href="{{route('frontend.request-withdrawal.index')}}">
                        Withdrawal Request
                    </a>
                    <a class="list-group-item {{ $routeName == 'frontend.tds.transactionIndex' ? 'active' : '' }}"
                        href="{{route('frontend.tds.transactionIndex')}}">
                        Tds Transactions
                    </a>
                    <a class="list-group-item {{ $routeName == 'frontend.tds.reports' ? 'active' : '' }}"
                        href="{{route('frontend.tds.reports')}}">
                        Tds Reports
                    </a>
                    <a class="list-group-item {{ $routeName == 'frontend.profile.editBankDetails' ? 'active' : '' }}"
                        href="{{route('frontend.profile.editBankDetails')}}">
                        Edit Bank Details
                    </a>
                    <a class="list-group-item " href="#">
                        My Buddies
                    </a> --}}
                    <a class="list-group-item " href="#">
                        My Subscriptions
                    </a>
                    <a href="{{route('frontend.address.index')}}" class="list-group-item {{(App\Helper\Common::getCurrentController() == 'AddressController') ? 'active' : ''}}" href="#">
                        My Addresses
                    </a>
                    {{-- <a class="list-group-item " href="#">
                        Coupon
                    </a> --}}
                    <a class="list-group-item " href="{{route('frontend.referralIndex')}}">
                        Referral
                    </a>
                    {{-- <a class="list-group-item " href="#">
                        Offers
                    </a>
                    <a class="list-group-item " href="#">
                        Downloads
                    </a>
                    <a class="list-group-item " href="#">
                        Earnings
                    </a> --}}
                </ul>
            </aside> <!-- col.// -->
            <div class="col-md-9 mt-lg-0 mt-5">
                @yield('profile-content')
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </section>
</div>
@endsection
