<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTdsColRequestWithdrawals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_withdrawals', function (Blueprint $table) {
            $table->double('requested_amount')->nullable()->after('amount');
            $table->double('tds_amount')->nullable()->after('amount');
            $table->float('amount')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_withdrawals', function (Blueprint $table) {
            $table->dropColumn('requested_amount');
            $table->dropColumn('tds_amount');
            $table->integer('amount')->change();
        });
    }
}
