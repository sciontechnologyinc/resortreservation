<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    protected $table="staffs";
	protected $fillable = [
        'staffid',
        'staffname',
        'contactno',
        'type',
	];
}
