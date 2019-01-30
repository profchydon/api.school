<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThirdPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_parties', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('allow_urls')->nullable();
          $table->string('deny_urls')->nullable();
          $table->string('domains')->nullable();
          $table->string('secret')->nullable();
          $table->integer('accepted')->nullable();
          $table->string('encrypted_secret')->nullable();
          $table->text('description')->nullable();
          $table->softDeletes();
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
        Schema::dropIfExists('third_parties');
    }
}
