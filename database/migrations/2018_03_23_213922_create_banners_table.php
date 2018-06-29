<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('image');
            $table->string('link');
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('width');
            $table->integer('height');
            $table->unsignedInteger('retailer_id');
            $table->timestamps();
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
        Schema::dropIfExists('banners');
    }
}
