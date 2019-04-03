<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('users_id');

            $table->string('monday')->default('off');
            $table->string('day_mon_timein')->nullable();
            $table->string('day_mon_timeout')->nullable();
            $table->string('night_mon_timein')->nullable();
            $table->string('night_mon_timeout')->nullable();

            $table->string('tuesday')->default('off');
            $table->string('day_tues_timein')->nullable();
            $table->string('day_tues_timeout')->nullable();
            $table->string('night_tues_timein')->nullable();
            $table->string('night_tues_timeout')->nullable();

            $table->string('wednesday')->default('off');
            $table->string('day_wed_timein')->nullable();
            $table->string('day_wed_timeout')->nullable();
            $table->string('night_wed_timein')->nullable();
            $table->string('night_wed_timeout')->nullable();

            $table->string('thursday')->default('off');
            $table->string('day_thurs_timein')->nullable();
            $table->string('day_thurs_timeout')->nullable();
            $table->string('night_thurs_timein')->nullable();
            $table->string('night_thurs_timeout')->nullable();

            $table->string('friday')->default('off');
            $table->string('day_fri_timein')->nullable();
            $table->string('day_fri_timeout')->nullable();
            $table->string('night_fri_timein')->nullable();
            $table->string('night_fri_timeout')->nullable();

            $table->string('saturday')->default('off');
            $table->string('day_sat_timein')->nullable();
            $table->string('day_sat_timeout')->nullable();
            $table->string('night_sat_timein')->nullable();
            $table->string('night_sat_timeout')->nullable();

            $table->string('sunday')->default('off');
            $table->string('day_sun_timein')->nullable();
            $table->string('day_sun_timeout')->nullable();
            $table->string('night_sun_timein')->nullable();
            $table->string('night_sun_timeout')->nullable();
            
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
        Schema::dropIfExists('schedules');
    }
}
