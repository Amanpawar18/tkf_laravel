<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'session_id',
        'product_id', 'quantity', 'variation_id'
    ];

    protected static function boot()
    {
        parent::boot();

        $url = url()->current();
        static::addGlobalScope('hasProduct', function (Builder $builder) {
            $builder->whereHas('product');
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProductCostAttribute()
    {
        $product = $this->product;
        $variation = $product->productVariations()->where('id', $this->variation_id)->first();

        if ($variation) {
            $cost = $variation->price;
        } else {

            // $cost = $this->is_sale ? $this->sale_price : $this->regular_price;
            $cost = $product->regular_price;
        }

        return $cost;
    }
}
