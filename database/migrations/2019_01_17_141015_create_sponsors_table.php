<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('third_party_id')->unsigned();
          $table->string('name')->nullable();
          $table->string('picture')->nullable();
          $table->string('title')->nullable();
          $table->string('email')->nullable();
          $table->string('phone')->nullable();
          $table->integer('is_anonymous')->nullable();
          $table->text('comments')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('third_party_id')->references('id')->on('third_parties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}
