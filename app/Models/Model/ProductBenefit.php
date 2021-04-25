<?php

namespace App\Models\Model;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBenefit extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'heading', 'description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
