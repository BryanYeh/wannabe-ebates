<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('title');
            $table->string('sale_image')->nullable();
            $table->string('code')->nullable();
            $table->string('link');
            $table->text('description')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('coupon_type_id');
            $table->unsignedInteger('retailer_id');
            $table->boolean('exclusive')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('coupon_type_id')->references('id')->on('coupon_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('coupons');
    }
}
