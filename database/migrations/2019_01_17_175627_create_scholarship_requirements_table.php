<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_requirements', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('label')->nullable();
          $table->string('hint')->nullable();
          $table->string('widget')->unique();
          $table->text('widget_options')->nullable();
          $table->integer('context_id')->nullable();
          $table->string('context_type')->unique();
          $table->integer('base_score')->nullable();
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
        Schema::dropIfExists('scholarship_requirements');
    }
}
