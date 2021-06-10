<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'size',
        'price', 'is_sale', 'sale_price',
        'quantity', 'batch_no', 'exp_date', 'mfg_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(ProductVariationImage::class, 'variation_id', 'id');
    }

    public function delete()
    {
        foreach ($this->images as $image) {

            $image->delete();
        }
        parent::delete();

        return true;
    }

    public function getCostAttribute()
    {
        $cost = $this->is_sale ? $this->sale_price : $this->price;
        return $cost;
    }
}
