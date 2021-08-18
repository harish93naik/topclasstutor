<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
           $table->bigIncrements('transaction_id');
           $table->unsignedBigInteger('booking_id');
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('token');
            $table->string('amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('booking_id')->references('booking_id')->on('booking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
