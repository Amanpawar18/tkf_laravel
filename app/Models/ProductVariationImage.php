<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariationImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'variation_id', 'image'];

    public function getImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path('frontend/uploads/product/' . $this->image))
            && is_file(public_path('frontend/uploads/product/' . $this->image))
        )
            $path = asset('frontend/uploads/product/' . $this->image);


        return $path;
    }

}
