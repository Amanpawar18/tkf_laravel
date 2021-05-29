@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header bg-transparent">Order History</div>
    @forelse ($orderProducts as $orderProduct)
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-2 text-lg-left text-center">
                <a class="h6 text-dark text-decoration-none"
                    href="{{route('frontend.product.details', $orderProduct->product->slug)}}">
                    <figure class="media">
                        <div class="img-wrap mr-3">
                            <img src="{{asset($orderProduct->product->image_path)}}"
                                class="img-sm object-fit-contain img-fluid" style="height: 100px">
                        </div>
                    </figure>
                </a>
            </div> <!-- col.// -->
            <div class="col-md-3 col-sm-6 col-6 text-lg-left text-center mt-md-2 ">
                <a class="h6 text-dark text-decoration-none"
                    href="{{route('frontend.product.details', $orderProduct->product->slug)}}">
                    {{$orderProduct->product->name}}
                </a>
                <br>
                <span>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star-o text-warning"></i>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 col-6 text-lg-left text-center mt-md-2 ">
                Quantity: {{$orderProduct->quantity}}
                <br>
                Total: ₹{{ $orderProduct->quantity * $orderProduct->amount }}
            </div>
            <div class="col-md-4 col-sm-12 col-12 text-right text-md-center">
               <a href="https://www.delhivery.com/track/package/{{$orderProduct->order->delhivery_waybill}}" target="_blank" class="btn btn-buy-now w-lg-auto m-lg-0 ">
                   Check Status
               </a>
            </div>
        </div>
        @if(!$loop->last)
        <hr>
        @endif
    </div>
    @empty
    <div class="card-body">
        No data found
    </div>
    @endforelse
</div>

@endsection
