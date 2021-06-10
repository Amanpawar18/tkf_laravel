<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHsnInventoryColsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('quantity')->default(0)->after('is_sale');
            $table->string('batch_no')->nullable()->after('quantity');
            $table->string('mfg_date')->nullable()->after('batch_no');
            $table->string('exp_date')->nullable()->after('mfg_date');
            $table->string('hsn')->nullable()->after('exp_date');
            $table->string('sac')->nullable()->after('hsn');
            $table->string('gst_rate')->nullable()->after('sac');
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
            $table->dropColumn('quantity');
            $table->dropColumn('batch_no');
            $table->dropColumn('mfg_date');
            $table->dropColumn('exp_date');
            $table->dropColumn('hsn');
            $table->dropColumn('sac');
            $table->dropColumn('gst_rate');
        });
    }
}
