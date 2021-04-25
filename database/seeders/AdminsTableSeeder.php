<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = DB::table('admins')->count();
        if (!$admins) {
            $admin = DB::table('admins')->where(['email' => 'admin@gmail.com'])->first();
            if ($admin == null) {
                DB::table('admins')->insert([
                    'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt(123456),
                ]);
            }
        }
    }
}
