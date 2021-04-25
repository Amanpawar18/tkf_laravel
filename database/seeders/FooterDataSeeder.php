<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footerData = DB::table('footer_data')->count();
        if (!$footerData) {
            $footerData = DB::table('footer_data')->first();
            if ($footerData == null) {
                DB::table('footer_data')->insert([
                    'image_one_link' => '#',
                    'image_two_link' => '#',
                    'image_three_link' => '#',
                    'image_four_link' => '#',
                    'image_five_link' => '#',
                ]);
            }
        }
    }
}
