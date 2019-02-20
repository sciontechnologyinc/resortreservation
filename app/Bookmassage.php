<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmassage extends Model
{
    protected $table="bookmassages";
	protected $fillable = [
        'user_id',
        'fullname',
        'contactno',
        'noofreservation',
        'status',
        'amount',
        'notification',
        'datepay',
        'datetime',
        'noofhours',
        'package'
	];

}