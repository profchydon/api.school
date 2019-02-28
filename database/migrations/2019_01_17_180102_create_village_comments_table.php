<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillageCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('commenter_id')->nullable();
            $table->integer('application_id')->nullable();
            $table->integer('profile_id')->nullable();
            $table->string('message')->nullable();
            $table->integer('replies_to')->nullable();
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
        Schema::dropIfExists('village_comments');
    }
}
