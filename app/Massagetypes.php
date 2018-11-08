<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Massagetypes extends Model
{
    protected $table="massagetypes";
	protected $fillable = [
        'massagetypename',
        'massagetypedescription',
        'price'
	];
}
