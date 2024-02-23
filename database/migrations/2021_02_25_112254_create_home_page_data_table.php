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

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->text('section_one_c1_image')->nullable();
            $table->text('section_one_c1_heading')->nullable();
            $table->text('section_one_c1_read_more_link')->nullable();

            $table->text('section_one_c2_image')->nullable();
            $table->text('section_one_c2_heading')->nullable();
            $table->text('section_one_c2_read_more_link')->nullable();
            
            $table->text('section_one_hidden_cost_desc')->nullable();
            $table->text('section_one_team_desc')->nullable();
            $table->text('section_one_availability_desc')->nullable();

            $table->text('section_two_exp_years')->nullable();
            $table->text('section_two_heading')->nullable();
            $table->text('section_two_heading_description')->nullable();
            $table->text('section_two_read_more_link')->nullable();
            $table->text('section_two_exp_team_desc')->nullable();
            $table->text('section_two_dedicated_team_desc')->nullable();
            
            $table->text('section_three_clients_count')->nullable();
            $table->text('section_three_garden_count')->nullable();
            $table->text('section_three_staff_count')->nullable();
            $table->text('section_three_awards_count')->nullable();
            
            $table->text('section_four_description')->nullable();

            $table->text('section_testimonial_desc')->nullable();

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
