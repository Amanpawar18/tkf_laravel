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
            $cost = $variation->cost;
        } else {

            $cost = $product->cost;
        }

        return $cost;
    }

    public function getStockAttribute()
    {
        $product = $this->product;
        $variation = $product->productVariations()->where('id', $this->variation_id)->first();

        if ($variation) {
            $quantity = $variation->quantity;
        } else {
            $quantity = $product->quantity;
        }
        return $quantity;
    }
}
