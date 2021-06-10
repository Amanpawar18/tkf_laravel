<?php

namespace App\Models;

use App\Helper\Common;
use App\Models\Model\ProductBenefit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'category_id', 'subcategory_id',
        'name', 'slug', 'sub_description',
        'description', 'product_detail',
        'composition', 'suggested_for',
        'direction_for_use', 'note',
        'sale_price', 'regular_price', 'is_sale',
        'quantity', 'batch_no', 'mfg_date',
        'exp_date', 'hsn', 'sac', 'gst_rate'
    ];

    protected static function boot()
    {
        parent::boot();

        $url = url()->current();
        static::addGlobalScope('notNullSlug', function (Builder $builder) {
            $builder->whereNotNull('slug');
        });

        if (strpos($url, 'admin') == false) {
            static::addGlobalScope('statusScope', function (Builder $builder) {
                $builder->where('status', self::ACTIVE);
            });
        }
    }


    // Spatie Sluggable
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name'])
            ->saveSlugsTo('slug');
    }


    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productFaqs()
    {
        return $this->hasMany(ProductFaq::class);
    }

    public function productBenefits()
    {
        return $this->hasMany(ProductBenefit::class);
    }


    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('price', 'ASC');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'subcategory_id', 'id');
    }


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


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCostAttribute()
    {

        $variation = $this->productVariations()->first();

        if ($variation) {
            $cost = $variation->price;
        } else {

            $cost = $this->is_sale ? $this->sale_price : $this->regular_price;
            // $cost = $this->regular_price;
        }
        $cost =  $cost;

        return $cost;
    }

    public function getCostNumericAttribute()
    {

        $variation = $this->productVariations()->first();

        if ($variation) {
            $cost = $variation->price;
        } else {

            // $cost = $this->is_sale ? $this->sale_price : $this->regular_price;
            $cost = $this->regular_price;
        }

        return $cost;
    }

    public function priceRange()
    {
        $range = '';

        if (count($this->productVariations) > 1) {

            $minPriceVariation  = $this->productVariations()->first();
            $maxPriceVariation  = $this->productVariations()->get()->last();

            // dd($minPriceVariation->id, $maxPriceVariation->id,  $this->productVariations()->count());

            if ($maxPriceVariation && $minPriceVariation) {
                $range = '₹' . $minPriceVariation->price . ' - ' . '₹' .  $maxPriceVariation->price;
            } else {
                $range = $this->cost;
            }
        } else {
            $range = $this->cost;
        }
        return $range;
    }

    public function delete()
    {
        $this->productFaqs()->delete();
        $this->productBenefits()->delete();
        $this->productVariations()->delete();

        $path = public_path('frontend/uploads/product');
        if (isset($this->image)) {
            Common::deleteExistingImage($this->image, $path);
        }

        parent::delete();

        return true;
    }
}
