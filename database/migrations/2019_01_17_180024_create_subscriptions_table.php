<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('type')->nullable();
          $table->date('closingDate')->nullable();
          $table->integer('grade')->nullable();
          $table->string('payment_id')->nullable();
          $table->decimal('amount')->nullable();
          $table->date('payment_agent')->nullable();
          $table->string('transaction_ref')->nullable();
          $table->integer('valid')->nullable();
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
