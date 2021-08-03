<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColsNullableClientExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_experiences', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->change();
            $table->integer('order_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_experiences', function (Blueprint $table) {
            $table->integer('user_id')->change();
            $table->integer('order_id')->change();
        });
    }
}
