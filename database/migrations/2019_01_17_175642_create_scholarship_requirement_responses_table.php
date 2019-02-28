<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipRequirementResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_requirement_responses', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('number_value')->nullable();
          $table->string('string_value')->nullable();
          $table->integer('application_id')->nullable();
          $table->integer('requirement_id')->unique();
          $table->integer('score')->nullable();
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
        Schema::dropIfExists('scholarship_requirement_responses');
    }
}
