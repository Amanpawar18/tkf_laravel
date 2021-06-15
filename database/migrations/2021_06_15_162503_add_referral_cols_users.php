<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferralColsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('referral_code')->after('name')->nullable();
            $table->string('referrer_user_id')->after('referral_code')->nullable();
            $table->string('referrer_user_code')->after('referrer_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('referral_code');
            $table->dropColumn('referrer_user_id');
            $table->dropColumn('referrer_user_code');
        });
    }
}
