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
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('activated')->default('0');
            $table->string('avatarUrl')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('users_activation' , function (Blueprint $table) {
           $table->increments('user_id')->references('id')->on('users');
           $table->string('token')->nullable();
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
        Schema::dropIfExists('users_activation');
    }
}
