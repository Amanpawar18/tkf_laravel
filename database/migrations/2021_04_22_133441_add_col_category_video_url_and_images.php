<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColCategoryVideoUrlAndImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('frontend_video_url')->nullable()->after('image');
            $table->string('frontend_image_one')->nullable()->after('frontend_video_url');
            $table->string('frontend_image_two')->nullable()->after('frontend_image_one');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('frontend_video_url');
            $table->dropColumn('frontend_image_one');
            $table->dropColumn('frontend_image_two');
        });
    }
}
