<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        // 'image',
        // 'frontend_video_url',
        // 'frontend_image_one',
        // 'frontend_image_two',
        // 'subscription_banner',
    ];


    // Spatie Sluggable
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name'])
            ->saveSlugsTo('slug');
    }


    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public static function parentCategories()
    {
        $categories = Category::whereHas('childrenCategories')->get();
        return $categories;
    }

    // recursive relationship
    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }


    public function delete()
    {
        $this->categories()->delete();
        parent::delete();

        return true;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');
        if (file_exists(public_path('frontend/uploads/category/' . $this->image)) && is_file(public_path('frontend/uploads/category/' . $this->image))) {

            $path = asset('frontend/uploads/category/' . $this->image);
        }
        return $path;
    }

    public function getFrontendImageOnePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');
        if (file_exists(public_path('frontend/uploads/category/' . $this->frontend_image_one)) && is_file(public_path('frontend/uploads/category/' . $this->frontend_image_one))) {

            $path = asset('frontend/uploads/category/' . $this->frontend_image_one);
        }
        return $path;
    }

    public function getFrontendImageTwoPathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');
        if (file_exists(public_path('frontend/uploads/category/' . $this->frontend_image_two)) && is_file(public_path('frontend/uploads/category/' . $this->frontend_image_two))) {

            $path = asset('frontend/uploads/category/' . $this->frontend_image_two);
        }
        return $path;
    }

    public function getSubscriptionBannerPathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');
        if (file_exists(public_path('frontend/uploads/category/' . $this->subscription_banner)) && is_file(public_path('frontend/uploads/category/' . $this->subscription_banner))) {

            $path = asset('frontend/uploads/category/' . $this->subscription_banner);
        }
        return $path;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategoryProducts()
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }
}
