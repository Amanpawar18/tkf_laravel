<?php

use App\Models\RequestWithdrawal;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('status')->default(RequestWithdrawal::STATUS_PENDING);
            $table->integer('amount');
            $table->string('acc_holder_name');
            $table->string('acc_number');
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('branch_name');
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
        Schema::dropIfExists('request_withdrawals');
    }
}
