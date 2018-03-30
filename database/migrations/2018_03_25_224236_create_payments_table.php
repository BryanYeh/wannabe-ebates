<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->float('amount', 8, 2)->default(0);
            $table->string('reference_id');
            $table->string('type'); //cashback, withdraw, signup bonus, ... (admin input choice)
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('payment_status_id'); //pending, approved, declined, confirmed
            $table->unsignedInteger('retailer_id');
            $table->uuid('trip_number')->nullable();
            $table->timestamps();
            $table->foreign('payment_status_id')->references('id')->on('payment_statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('retailer_id')->references('id')->on('retailers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
