<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterData extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_us_link', 'terms_of_use_link',
        'privacy_policy_link', 'order_link',
        'shipping_link', 'who_we_are_link',
        'product_faqs_link', 'science_link',
        'quality_link', 'buddy_club_link',
        'subscribe_link', 'affiliate_link',
    ];



    public function getImageOnePathAttribute()
    {
        $path = asset('frontend/assets/images/1.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->image_one))
            && is_file(public_path('frontend/uploads/home-page/' . $this->image_one))
        )
            $path = asset('frontend/uploads/home-page/' . $this->image_one);

        return $path;
    }

    public function getImageTwoPathAttribute()
    {
        $path = asset('frontend/assets/images/2.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->image_two))
            && is_file(public_path('frontend/uploads/home-page/' . $this->image_two))
        )
            $path = asset('frontend/uploads/home-page/' . $this->image_two);

        return $path;
    }

    public function getImageThreePathAttribute()
    {
        $path = asset('frontend/assets/images/3.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->image_three))
            && is_file(public_path('frontend/uploads/home-page/' . $this->image_three))
        )
            $path = asset('frontend/uploads/home-page/' . $this->image_three);

        return $path;
    }

    public function getImageFourPathAttribute()
    {
        $path = asset('frontend/assets/images/4.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->image_four))
            && is_file(public_path('frontend/uploads/home-page/' . $this->image_four))
        )
            $path = asset('frontend/uploads/home-page/' . $this->image_four);

        return $path;
    }

    public function getImageFivePathAttribute()
    {
        $path = asset('frontend/assets/images/5.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->image_five))
            && is_file(public_path('frontend/uploads/home-page/' . $this->image_five))
        )
            $path = asset('frontend/uploads/home-page/' . $this->image_five);

        return $path;
    }

    public static function get($field)
    {
        $data = self::first();
        return $data->$field ?? null;
    }
}
