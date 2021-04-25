<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_data', function (Blueprint $table) {
            $table->id();

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->string('header_video_url')->nullable();
            $table->string('section_one_heading')->nullable();
            $table->string('section_one_heading_description')->nullable();
            $table->string('read_more_link')->nullable();

            $table->string('section_two_heading')->nullable();
            $table->string('section_two_heading_description')->nullable();

            $table->string('section_three_heading')->nullable();
            $table->string('section_three_image')->nullable();

            $table->string('section_four_heading')->nullable();

            $table->string('section_five_image')->nullable();

            $table->string('section_six_image_one')->nullable();
            $table->string('section_six_image_two')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_page_data');
    }
}
