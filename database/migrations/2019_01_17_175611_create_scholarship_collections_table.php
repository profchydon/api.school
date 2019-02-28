<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_collections', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->nullable();
          $table->text('description')->nullable();
          $table->string('image_url')->nullable();
          $table->integer('repeats')->unique();
          $table->string('pub_id')->nullable();
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
        Schema::dropIfExists('scholarship_collections');
    }
}
