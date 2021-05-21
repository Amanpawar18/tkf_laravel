<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Image extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['image', 'image_name', 'slug'];

    public function getPathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path('frontend/uploads/images/' . $this->image))
            && is_file(public_path('frontend/uploads/images/' . $this->image))
        )
            $path = asset('frontend/uploads/images/' . $this->image);

        return $path;
    }


    // Spatie Sluggable
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['image_name'])
            ->saveSlugsTo('slug');
    }

}
