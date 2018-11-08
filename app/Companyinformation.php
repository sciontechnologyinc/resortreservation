<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companyinformation extends Model
{
    protected $table="companyinformation";
	protected $fillable = [
        'user_id',
        'companyname',
        'mission',
        'vision',
        'contactno',
        'address',
        'email',
        'footerinformation',
        'photo',
        
	];
}
