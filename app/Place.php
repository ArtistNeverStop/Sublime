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
        'name',
        'floors',
        'area',
        'people_limit',
        'longitude',
        'latitude',
        'description'
    ];

    # ------------------------------ RELATIONS ------------------------------ #

    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artistsAvailable()
    {
        return $this->belongsToMany('App\Places', 'artist_available_places');
    }
}
