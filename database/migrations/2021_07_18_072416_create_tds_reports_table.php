<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tds_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('period');
            $table->string('period_start');
            $table->string('period_end');
            $table->string('report');
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
        Schema::dropIfExists('tds_reports');
    }
}
