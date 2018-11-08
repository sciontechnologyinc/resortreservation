<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table="packages";
	protected $fillable = [
        'user_id',
        'packagecode',
        'packagedescription',
        'price',
        'photo'
	];
}
