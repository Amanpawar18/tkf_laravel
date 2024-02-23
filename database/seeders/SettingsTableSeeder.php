<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = DB::table('settings')->count();
        if (!$settings) {
            $data = [
                [
                    'key' => 'website_name',
                    'value' => 'The Keshav Farm',
                ],
                [
                    'key' => 'website_email',
                    'value' => 'chiragpanwar303@gmail.com',
                ],
                [
                    'key' => 'footer_logo',
                    'value' => '',
                ],
                [
                    'key' => 'website_logo',
                    'value' => '',
                ],
                [
                    'key' => 'facebook_link',
                    'value' => '',
                ],
                [
                    'key' => 'instagram_link',
                    'value' => '',
                ],
                [
                    'key' => 'youtube_link',
                    'value' => '',
                ],
                [
                    'key' => 'mobile_no',
                    'value' => '+91-8385050621',
                ],
                [
                    'key' => 'email',
                    'value' => 'chiragpanwar303@gmail.com',
                ],
                [
                    'key' => 'address',
                    'value' => '422, Gautam Marg, Nirman nagar, Jaipur',
                ]
            ];
            DB::table('settings')->insert($data);
        }
    }
}
