<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

	# ------------------------------ RELATIONS ------------------------------ #

	/**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function placesAvailable()
    {
        return $this->belongsToMany('App\Place', 'artist_available_place')->withPivot([
            'start_at',
            'finish_at',
            'price',
            'min_quantity_persons',
            'price_per_person',
            'extra_specifications'
        ]);
    }
}
