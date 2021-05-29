<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDelhiveryColsInOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('delhivery_waybill')->nullable()->after('address_id');
            $table->string('delhivery_refnum')->nullable()->after('delhivery_waybill');
            $table->string('delhivery_upload_wbn')->nullable()->after('delhivery_refnum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('delhivery_waybill');
            $table->dropColumn('delhivery_refnum');
            $table->dropColumn('delhivery_upload_wbn');
        });
    }
}
