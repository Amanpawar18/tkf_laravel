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
                    'meta_title' => 'The Keshav farm',
                    'meta_description' => 'One stop for all the plants & pets needs',
                    'meta_keywords' => 'Plant, Pets, Gardening, Flowers',

                    'section_one_c1_image' => 'carousel-1.jpg',
                    'section_one_c1_heading' => 'Make Your Home Like Garden',
                    'section_one_c1_read_more_link' => null,

                    'section_one_c2_image' => 'carousel-2.jpg',
                    'section_one_c2_heading' => 'Create Your Own Small Garden At Home',
                    'section_one_c2_read_more_link' => null,

                    'section_one_hidden_cost_desc' => 'Transparent Pricing: No Hidden Costs, No Surprises!',
                    'section_one_team_desc' => "Empower Your Vision with Our Dedicated Team - Your Wish, Our Commitment.",
                    'section_one_availability_desc' => "Your Need, Our Promise: Always On, Always Available, 24/7.",

                    'section_two_exp_years' => '10',
                    'section_two_heading' => "Nurturing Nature's Best: Your One-Stop Haven for Pets and Plants!",
                    'section_two_heading_description' => "Discover a world where pets and plants thrive together. Our shop is a haven for green enthusiasts and pet lovers, offering a curated blend of natural companionship and botanical beauty.",
                    'section_two_read_more_link' => null,

                    'section_two_exp_team_desc' => 'Experience the Difference: Our Expert Team Drives Your Vision Forward',
                    'section_two_dedicated_team_desc' => 'Empower Your Vision with Our Dedicated Team - Your Wish, Our Commitment.',

                    'section_three_clients_count' => 1234,
                    'section_three_garden_count' => 70,
                    'section_three_staff_count' => 8,
                    'section_three_awards_count' => 2,

                    'section_four_description' => "Choosing us means selecting a dedicated team committed to excellence. We prioritize your satisfaction, offering a seamless blend of expertise, reliability, and innovation. Our commitment to quality sets us apart, ensuring that your needs are not just met but exceeded.",

                    'section_testimonial_desc' => 'Explore the voices of satisfaction in our client testimonials. From real experiences to genuine success stories, discover why our service stands out as a trusted choice for those who value excellence and results',
                ]);
            }
        }
    }
}
