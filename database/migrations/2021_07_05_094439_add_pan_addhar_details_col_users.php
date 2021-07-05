<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPanAddharDetailsColUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('pan_no')->nullable()->after('branch_name');
            $table->string('pan_front_image')->nullable()->after('pan_no');
            $table->string('pan_back_image')->nullable()->after('pan_front_image');

            $table->string('aadhaar_no')->nullable()->after('pan_back_image');
            $table->string('aadhaar_front_image')->nullable()->after('aadhaar_no');
            $table->string('aadhaar_back_image')->nullable()->after('aadhaar_front_image');
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
            $table->dropColumn('pan_no');
            $table->dropColumn('pan_front_image');
            $table->dropColumn('pan_back_image');

            $table->dropColumn('aadhaar_no');
            $table->dropColumn('aadhaar_front_image');
            $table->dropColumn('aadhaar_back_image');
        });
    }
}
