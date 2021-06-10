@if(count($product->productVariations))

@foreach ($product->productVariations as $key => $variation)
@if($variation->quantity > 0)
<button type="submit" id="buyNow-{{$variation->id}}" class="btn btn-buy-now w-auto m-0 buyNow shop-now-btn {{$loop->first ? '' : 'd-none'}}">
    Buy Now
    <i class="fa fa-angle-right"></i>
</button>
@else
<span id="buyNow-{{$variation->id}}" class="text-danger h5 buyNow mt-3 {{$loop->first ? '' : 'd-none'}}">Out of stock</span>
@endif
@endforeach

@else

@if($product->quantity > 0)
<button type="submit" class="btn btn-buy-now w-auto m-0 shop-now-btn">
    Buy Now
    <i class="fa fa-angle-right"></i>
</button>
@else
<span class="text-danger h5 mt-3">Out of stock</span>
@endif

@endif
