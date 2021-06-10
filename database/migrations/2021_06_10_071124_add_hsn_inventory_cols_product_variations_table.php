<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHsnInventoryColsProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_variations', function (Blueprint $table) {
            $table->integer('is_sale')->default(0)->after('price');
            $table->integer('sale_price')->default(0)->after('is_sale');
            $table->integer('quantity')->default(0)->after('sale_price');
            $table->string('batch_no')->nullable()->after('quantity');
            $table->string('mfg_date')->nullable()->after('batch_no');
            $table->string('exp_date')->nullable()->after('mfg_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_variations', function (Blueprint $table) {
            $table->dropColumn('is_sale');
            $table->dropColumn('sale_price');
            $table->dropColumn('quantity');
            $table->dropColumn('batch_no');
            $table->dropColumn('mfg_date');
            $table->dropColumn('exp_date');
        });
    }
}
