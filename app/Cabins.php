<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabins extends Model
{
    protected $table="cabins";
	protected $fillable = [
        'cabinno',
        'cabinname',
        'cabindescription'
	];
}
