<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('sponsor_id')->unsigned();
          $table->string('name')->nullable();
          $table->string('faculty')->nullable();
          $table->string('college')->nullable();
          $table->string('department')->nullable();
          $table->string('state')->nullable();
          $table->string('website')->nullable();
          $table->string('course')->nullable();
          $table->string('cgpa')->nullable();
          $table->string('deadline')->nullable();
          $table->string('school')->nullable();
          $table->string('award')->nullable();
          $table->string('major')->nullable();
          $table->string('country')->nullable();
          $table->string('gender')->nullable();
          $table->integer('minimum_subscription_grade')->nullable();
          $table->string('category')->nullable();
          $table->dateTime('dated_deadline')->nullable();
          $table->integer('yearly')->nullable();
          $table->dateTime('last_accessed')->nullable();
          $table->integer('access_count')->nullable();
          $table->decimal('amount_award')->nullable();
          $table->string('award_currency')->nullable();
          $table->text('description')->nullable();
          $table->dateTime('approved_at')->nullable();
          $table->string('meta_data')->nullable();
          $table->string('image_url')->nullable();
          $table->dateTime('commence_date')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('sponsor_id')->references('id')->on('sponsors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
