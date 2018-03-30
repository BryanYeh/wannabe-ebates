<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website');
            $table->string('tracking_link')->nullable();
            $table->string('program_id')->nullable();
            $table->text('description')->nullable();
            $table->text('conditions')->nullable();
            $table->text('tags')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('meta_description',160)->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('slug')->unique();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('affiliate_network_id');
            $table->boolean('store_of_week')->default(false);
            $table->boolean('featured_store')->default(false);
            $table->timestamps();
            $table->foreign('affiliate_network_id')->references('id')->on('affiliate_networks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retailers');
    }
}
