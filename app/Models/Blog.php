<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'content', 'meta_title', 'meta_description', 'meta_keywords'];

    // banner_image

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function getBannerImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path('frontend/uploads/blog/' . $this->banner_image))
            && is_file(public_path('frontend/uploads/blog/' . $this->banner_image))
        )
            $path = asset('frontend/uploads/blog/' . $this->banner_image);


        return $path;
    }
}
