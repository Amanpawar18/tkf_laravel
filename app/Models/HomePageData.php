<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageData extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',

        'section_one_c1_image',
        'section_one_c1_heading',
        'section_one_c1_read_more_link',

        'section_one_c2_image',
        'section_one_c2_heading',
        'section_one_c2_read_more_link',
        
        'section_one_hidden_cost_desc',
        'section_one_team_desc',
        'section_one_availability_desc',

        'section_two_exp_years',
        'section_two_heading',
        'section_two_heading_description',
        'section_two_read_more_link',
        'section_two_exp_team_desc',
        'section_two_dedicated_team_desc',
        
        'section_three_clients_count',
        'section_three_garden_count',
        'section_three_staff_count',
        'section_three_awards_count',
        
        'section_four_description',

        'section_testimonial_desc',
    ];

    public function getSectionOneImageOnePathAttribute()
    {
        $path = null;
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_one_c1_image))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_one_c1_image))
        )
            $path = 'public/frontend/uploads/home-page/' . $this->section_one_c1_image;
        return $path;
    }

    public function getSectionOneImageTwoPathAttribute()
    {
        $path = null;
        if (
            file_exists(public_path('frontend/uploads/home-page/' . $this->section_one_c2_image))
            && is_file(public_path('frontend/uploads/home-page/' . $this->section_one_c2_image))
        )
            $path = 'public/frontend/uploads/home-page/' . $this->section_one_c2_image;
        return $path;
    }
}
