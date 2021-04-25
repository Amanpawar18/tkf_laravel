<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homePageData = DB::table('home_page_data')->count();
        if (!$homePageData) {
            $admin = DB::table('home_page_data')->first();
            if ($admin == null) {
                DB::table('home_page_data')->insert([
                    'meta_title' => 'Venttura',
                    'meta_description' => 'Venttura',
                    'meta_keywords' => 'Venttura',

                    'header_video_url' => 'https://www.youtube.com/embed/67gDzVz08CE?playlist=67gDzVz08CE&autoplay=1&mute=1&loop=1&controls=0',
                    'section_one_heading' => 'Who We Are',
                    'section_one_heading_description' => 'Venttura BIOceuticals’ Mission is to Redefine the Future of Health and Wellness in Dogs,
                    Cats, Horses and People',

                    'read_more_link' => "Suit's",

                    'section_two_heading' => 'Quality Supplements for All Breeds, Ages and Stages',
                    'section_two_heading_description' => ' Our supplements address most of the conditions seen commonly in pets ',

                    'section_three_heading' => "Subscribe to get 20% Discount",
                    'section_three_image' => 'collection',

                    'section_four_heading' => "Client Experiences",

                    'section_five_image' => 'collection',

                    'section_six_image_one' => '#',
                    'section_six_image_two' => '#',


                ]);
            }
        }
    }
}
