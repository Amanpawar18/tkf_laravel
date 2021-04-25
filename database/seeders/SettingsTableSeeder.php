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
                    'value' => 'Venttura',
                ],
                [
                    'key' => 'website_email',
                    'value' => 'venttura@gmail.com',
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
                    'key' => 'footer_address',
                    'value' => 'Address :A-34, Gala No 1&amp;2,Royal Industrial Hub,Vasai - Bhiwandi
                    Road,Opp Kaman Police Check Post, Village Poman,Vasai,<br>
                    Thane - 401208Maharashtra<br>
                    IndiaCell :-&nbsp;+91 9820526274<br>
                    Care :- +91 9833103030<br>
                    Email&nbsp;:-&nbsp;ventturain@gmail.com<br>
                    Visit Us on&nbsp;www.venttura.in',
                ]
            ];
            DB::table('settings')->insert($data);
        }
    }
}
