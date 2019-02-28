<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorApplicationFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_application_funds', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('sponsor_id')->unsigned();
          $table->integer('sponsor_application_id')->unsigned();
          $table->integer('third_party_id')->unsigned();
          $table->datetime('initiated_at')->nullable();
          $table->string('currency')->nullable();
          $table->decimal('actual_amount')->nullable();
          $table->integer('is_private')->nullable();
          $table->string('payment_id')->nullable();
          $table->string('payment_method')->nullable();
          $table->string('remark')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('sponsor_id')->references('id')->on('sponsors');
          $table->foreign('sponsor_application_id')->references('id')->on('sponsor_applications');
          $table->foreign('third_party_id')->references('id')->on('third_parties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsor_application_funds');
    }
}
