<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('spec_id')->unsigned();
          $table->string('statement')->nullable();
          $table->string('label')->nullable();
          $table->string('answer_type')->nullable();
          $table->string('validation')->nullable();
          $table->timestamps();
          $table->foreign('spec_id')->references('id')->on('question_specs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
