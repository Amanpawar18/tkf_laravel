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
            <div class="col-md-2 col-sm-6 col-6 text-lg-left text-center mt-md-2 ">
                <a class="h6 text-dark text-decoration-none"
                    href="{{route('frontend.product.details', $orderProduct->product->slug)}}">
                    {{$orderProduct->product->name}}
                </a>
                <br>
                <span>
                    @if($orderProduct->clientExperience)
                    <small>
                        Experienced shared
                    </small>
                    @else
                    {{-- <a href="#" data-bs-target="#experienceModel" data-bs-toggle="modal">Share experience</a> --}}
                    <a href="#" class="openExperienceModel" data-order-id="{{$orderProduct->order_id}}"
                        data-product-id="{{$orderProduct->product_id}}" data-order-product-id="{{$orderProduct->id}}">
                        Share experience
                    </a>
                    @endif
                </span>
            </div>
            <div class="col-md-2 col-sm-6 col-6 text-lg-left text-center mt-md-2 ">
                Quantity: {{$orderProduct->quantity}}
                <br>
                Total: ₹{{ $orderProduct->quantity * $orderProduct->amount }}
            </div>
            <div class="col-md-3 col-sm-12 col-12 text-right">
                <a href="{{route('frontend.order.invoice', $orderProduct->order_id)}}" target="_blank"
                    class="btn btn-buy-now w-lg-auto w-100 m-lg-0 ">
                    <i class="fa fa-file"></i>
                    Invoice
                </a>
            </div>
            <div class="col-md-3 col-sm-12 col-12 text-right">
                <a href="https://www.delhivery.com/track/package/{{$orderProduct->order->delhivery_waybill}}"
                    target="_blank" class="btn btn-buy-now w-lg-auto w-100 m-lg-0 ">
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
<div class="modal fade" id="experienceModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="experienceModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="experienceModel">Share your experince</h5>
            </div>
            <form action="{{route('frontend.order.saveExperience')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-3 py-2">
                    <input type="hidden" name="product_id" id="product_id" class="form-control">
                    <input type="hidden" name="order_id" id="order_id" class="form-control">
                    <input type="hidden" name="order_product_id" id="order_product_id" class="form-control">
                    <div class="form-group mb-2">
                        <label for="image">Image (Buddy Image)</label>
                        <input type="file" name="image" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Experience</label>
                        <textarea name="description" id="description" required cols="30" rows="3"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
