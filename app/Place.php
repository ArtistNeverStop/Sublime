<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	// 'city',
    	'address',
        'floors',
        'area',
        'people_limit',
        'longitude',
        'latitude'
    ];
}
