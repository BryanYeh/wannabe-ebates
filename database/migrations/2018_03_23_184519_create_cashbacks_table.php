<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->float('amount', 8, 2);
            $table->float('amount_back', 8,2);
            $table->char('type',1)->default('%'); // % or $
            $table->unsignedInteger('retailer_id');
            $table->foreign('retailer_id')->references('id')->on('retailers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cashbacks');
    }
}
