<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmassage extends Model
{
    protected $table="bookmassages";
	protected $fillable = [
        'user_id',
        'code',
        'contactno',
        'amount',
        'notification',
        'datepay',
        'from',
        'start_date',
        'end_date',
        'night',
        'package',
        'status'
	];

}