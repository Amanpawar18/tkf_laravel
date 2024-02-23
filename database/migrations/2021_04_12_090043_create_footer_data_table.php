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

            $table->string('contact_us_link')->nullable();
            $table->string('terms_of_use_link')->nullable();
            $table->string('privacy_policy_link')->nullable();
            $table->string('order_link')->nullable();
            $table->string('shipping_link')->nullable();
            $table->string('who_we_are_link')->nullable();
            $table->string('product_faqs_link')->nullable();

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
