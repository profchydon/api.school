<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funding_requests', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('student_id')->unsigned();
          $table->string('title')->nullable();
          $table->text('details')->nullable();
          $table->string('image')->nullable();
          $table->string('amount_needed')->nullable();
          $table->string('amount_raised')->nullable();
          $table->string('start_date')->nullable();
          $table->string('end_date')->nullable();
          $table->timestamps();
          $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funding_requests');
    }
}
