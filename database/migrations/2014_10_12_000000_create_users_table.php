<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // $table->uuid('uuid');
            $table->string('first_name')->nullable();;
            $table->string('last_name')->nullable();;
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->boolean('status')->default(false);
            $table->float('total_cashback', 8, 2)->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
