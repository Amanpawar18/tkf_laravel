<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageData extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title', 'meta_description',
        'meta_keywords',
        'header_video_url',
        'section_one_heading', 'section_one_heading_description',
        'read_more_link',
        'section_two_heading', 'section_two_heading_description',
        'section_three_heading', 'section_three_image',
        'section_four_heading',
        'section_five_image',
        'section_six_image_one',
        'section_six_image_two'
    ];


    public function getSectionThreeImageHalfPathAttribute()
    {
        $path = null;
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_three_image))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_three_image))
        )
            $path = 'public/frontend/uploads/home-page/' . $this->section_three_image;
        return $path;
    }


    public function getSectionThreeImagePathAttribute()
    {
        $path = asset('frontend/assets/img/bg1.jpg');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_three_image))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_three_image))
        )
            $path = asset('frontend/uploads/home-page/' . $this->section_three_image);

        return $path;
    }

    public function getSectionFiveImagePathAttribute()
    {
        $path = asset('frontend/assets/images/Referral.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_five_image))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_five_image))
        )
            $path = asset('frontend/uploads/home-page/' . $this->section_five_image);


        return $path;
    }

    public function getSectionSixImageOnePathAttribute()
    {
        $path = asset('frontend/assets/images/compressed-hbom.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_six_image_one))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_six_image_one))
        )
            $path = asset('frontend/uploads/home-page/' . $this->section_six_image_one);


        return $path;
    }

    public function getSectionSixImageTwoPathAttribute()
    {
        $path = asset('frontend/assets/images/compressed-tk05.png');
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_six_image_two))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_six_image_two))
        )
            $path = asset('frontend/uploads/home-page/' . $this->section_six_image_two);


        return $path;
    }
}
