<?php

use App\Models\ClientExperience;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('category_id');
            $table->integer('status')->default(ClientExperience::INACTIVE);
            $table->string('description');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('client_experiences');
    }
}
