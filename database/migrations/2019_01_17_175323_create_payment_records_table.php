<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('client')->nullable();
          $table->integer('amount')->nullable();
          $table->string('provider')->nullable();
          $table->string('order_id')->nullable();
          $table->string('provider_id')->unique();
          $table->string('currency')->nullable();
          $table->text('meta_data')->nullable();
          $table->softDeletes();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_records');
    }
}
