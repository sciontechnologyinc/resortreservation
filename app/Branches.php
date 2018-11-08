<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    protected $table="branches";
	protected $fillable = [
        'branchno',
        'branchname',
        'address',
        'contactno'
	];
}
