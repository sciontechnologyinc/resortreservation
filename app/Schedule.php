<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable =  [
            'users_id',
            'monday',
            'day_mon_timein',
            'day_mon_timeout',
            'night_mon_timein',
            'night_mon_timeout',
            'tuesday',
            'day_tues_timein',
            'day_tues_timeout',
            'night_tues_timein',
            'night_tues_timeout',
            'wednesday',
            'day_wed_timein',
            'day_wed_timeout',
            'night_wed_timein',
            'night_wed_timeout',
            'thursday',
            'day_thurs_timein',
            'day_thurs_timeout',
            'night_thurs_timein',
            'night_thurs_timeout',
            'friday',
            'day_fri_timein',
            'day_fri_timeout',
            'night_fri_timein',
            'night_fri_timeout',
            'saturday',
            'day_sat_timein',
            'day_sat_timeout',
            'night_sat_timein',
            'night_sat_timeout',
            'sunday',
            'day_sun_timein',
            'day_sun_timeout',
            'night_sun_timein',
            'night_sun_timeout'
    ];
}
