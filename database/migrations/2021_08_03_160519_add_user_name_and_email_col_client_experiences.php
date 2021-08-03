<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserNameAndEmailColClientExperiences extends Migration
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
            $table->text('description')->nullable()->change();
            $table->string('user_name')->nullable()->after('user_id');
            $table->string('user_email')->nullable()->after('user_name');
            $table->integer('order_product_id')->nullable()->after('user_email');
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
            $table->text('description')->change();
            $table->dropColumn('user_name');
            $table->dropColumn('user_email');
            $table->dropColumn('order_product_id');
        });
    }
}
