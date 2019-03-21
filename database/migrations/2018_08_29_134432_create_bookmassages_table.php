<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmassages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('code');
            $table->string('contactno');
            $table->string('amount')->default('0');
            $table->boolean('notification')->default('0');
            $table->string('datepay')->default('');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('daytime')->nullable();
            $table->string('nighttime')->nullable();
            $table->string('package');
            $table->string('status');
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
        Schema::dropIfExists('bookmassages');
    }
}