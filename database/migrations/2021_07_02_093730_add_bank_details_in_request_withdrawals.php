<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankDetailsInRequestWithdrawals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_withdrawals', function (Blueprint $table) {
            $table->string('transfer_bank_name')->nullable()->after('branch_name');
            $table->string('transfer_transaction_id')->nullable()->after('transfer_bank_name');
            $table->string('transfer_date')->nullable()->after('transfer_transaction_id');
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
            $table->dropColumn('transfer_bank_name');
            $table->dropColumn('transfer_transaction_id');
            $table->dropColumn('transfer_date');
        });
    }
}
