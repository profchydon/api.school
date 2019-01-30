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
          $table->string('name');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('platform')->nullable();
          $table->string('gender')->nullable();
          $table->string('phone')->unique()->nullable();
          $table->string('user_group')->nullable();
          $table->string('role')->nullable();
          $table->string('auth_token')->unique()->nullable();
          $table->dateTime('auth_expiry')->nullable();
          $table->integer('active')->default('0')->nullable();
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
