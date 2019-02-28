<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academic_profile_id')->unsigned();
            $table->decimal('total_fund')->nullable();
            $table->date('maximum_date_required')->nullable();
            $table->decimal('amount')->nullable();
            $table->text('story')->nullable();
            $table->string('short_story')->nullable();
            $table->integer('status')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('is_private')->nullable();
            $table->timestamps();
            $table->foreign('academic_profile_id')->references('id')->on('academic_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsor_applications');
    }
}
