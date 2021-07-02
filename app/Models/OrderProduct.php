<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'user_id',
        'product_id', 'variation_id', 'quantity',
        'amount'
    ];

    protected static function boot()
    {
        parent::boot();

        $url = url()->current();
        static::addGlobalScope('hasOrderAndProduct', function (Builder $builder) {
            $builder->whereHas('order');
            $builder->whereHas('product');
            $builder->orderBy('id', 'DESC');
        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function getProductNameAttribute()
    {
        $product = $this->product;
        $variation = $product->productVariations()->where('id', $this->variation_id)->first();

        if ($variation) {
            $name = $product->name;
            $name .= '(' . $variation->size . ')';
        } else {

            $name = $product->name;
        }

        return $name;
    }
}
