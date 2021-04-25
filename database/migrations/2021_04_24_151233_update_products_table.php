<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('product_detail')->nullable()->after('description');
            $table->text('composition')->nullable()->after('product_detail');
            $table->text('suggested_for')->nullable()->after('composition');
            $table->text('direction_for_use')->nullable()->after('suggested_for');
            $table->text('note')->nullable()->after('direction_for_use');
            $table->string('product_view_count')->nullable()->after('note');
            $table->dropColumn('size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_detail');
            $table->dropColumn('composition');
            $table->dropColumn('suggested_for');
            $table->dropColumn('direction_for_use');
            $table->dropColumn('note');
            $table->dropColumn('product_view_count');
            $table->string('size')->after('description')->nullable();
        });
    }
}
