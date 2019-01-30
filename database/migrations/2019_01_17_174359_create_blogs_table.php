<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('author_id')->unsigned();
          $table->string('picture')->nullable();
          $table->string('body')->nullable();
          $table->string('title')->nullable();
          $table->string('tags')->nullable();
          $table->string('summary')->nullable();
          $table->string('source_name')->nullable();
          $table->string('source_url')->nullable();
          $table->string('reference')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
