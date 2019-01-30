<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_specs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('header')->nullable();
          $table->string('requirements')->nullable();
          $table->string('category')->nullable();
          $table->integer('version')->nullable();
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
        Schema::dropIfExists('questions_specs');
    }
}
