<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_data', function (Blueprint $table) {
            $table->id();

            $table->string('image_one')->nullable();
            $table->string('image_one_link')->nullable();

            $table->string('image_two')->nullable();
            $table->string('image_two_link')->nullable();

            $table->string('image_three')->nullable();
            $table->string('image_three_link')->nullable();

            $table->string('image_four')->nullable();
            $table->string('image_four_link')->nullable();

            $table->string('image_five')->nullable();
            $table->string('image_five_link')->nullable();

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
        Schema::dropIfExists('footer_data');
    }
}
