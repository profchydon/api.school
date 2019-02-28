<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_sponsors', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->string('logo')->nullable();
          $table->text('full_description')->nullable();
          $table->string('website')->nullable();
          $table->string('banner_image_url')->nullable();
          $table->decimal('amount')->nullable();
          $table->string('country')->nullable();
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
        Schema::dropIfExists('scholarship_sponsors');
    }
}
