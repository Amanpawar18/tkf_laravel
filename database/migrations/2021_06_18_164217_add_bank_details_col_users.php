<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankDetailsColUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('acc_holder_name')->nullable()->after('password');
            $table->string('acc_number')->nullable()->after('acc_holder_name');
            $table->string('bank_name')->nullable()->after('acc_number');
            $table->string('ifsc_code')->nullable()->after('bank_name');
            $table->string('branch_name')->nullable()->after('ifsc_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('acc_holder_name');
            $table->dropColumn('acc_number');
            $table->dropColumn('bank_name');
            $table->dropColumn('ifsc_code');
            $table->dropColumn('branch_name');
        });
    }
}
