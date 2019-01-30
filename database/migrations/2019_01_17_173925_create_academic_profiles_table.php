<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_profiles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('picture')->nullable();
          $table->string('institution')->nullable();
          $table->string('category')->nullable();
          $table->dateTime('date_started')->nullable();
          $table->string('meta_data')->nullable();
          $table->string('country')->nullable();
          $table->string('state')->nullable();
          $table->string('app_limit')->nullable();
          $table->date('date_of_birth')->nullable();
          $table->string('gender')->nullable();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_profiles');
    }
}
