<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientExperience extends Model
{
    use HasFactory;

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'user_id', 'product_id',
        'order_product_id', 'category_id',
        'description', 'image', 'status',
        'user_name', 'user_email', 'order_id'
    ];


    protected static function boot()
    {
        parent::boot();

        $url = url()->current();
        static::addGlobalScope('relationScope', function (Builder $builder) {
            // $builder->whereHas('user');
            $builder->whereHas('product');
            // $builder->whereHas('order');
            $builder->whereHas('category');
        });

        if (strpos($url, 'admin') == false) {
            static::addGlobalScope('statusScope', function (Builder $builder) {
                $builder->where('status', self::ACTIVE);
            });
        }
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderProduct()
    {
        return $this->belongsTo(OrderProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImagePathAttribute()
    {
        $path = asset('frontend/uploads/default_category.png');

        if (
            file_exists(public_path('frontend/uploads/experience/' . $this->image))
            && is_file(public_path('frontend/uploads/experience/' . $this->image))
        )
            $path = asset('frontend/uploads/experience/' . $this->image);

        return $path;
    }

}
