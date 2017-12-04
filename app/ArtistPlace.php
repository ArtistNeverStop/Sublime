<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistPlace extends Model
{
    protected $fillable = [
        'start_at',
        'finish_at',
        'price',
        'min_quantity_persons',
        'price_per_person',
        'extra_specifications'
    ];

    protected $appends = [
        'persons_remeaning',
        'tickets_count'
    ];

    protected $table = 'artist_available_place';

    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place()
    {
        return $this->belongsTo('App\Place', 'place_id');
    }

    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo('App\Artist', 'artist_id');
    }

    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tickets()
    {
        return $this->hasMany('App\Ticket', 'artist_available_place_id', 'id');
    }


    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getPersonsRemeaningAttribute()
    {
        return $this->min_quantity_persons - $this->tickets()->count();
    }

        /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getTicketsCountAttribute()
    {
        return $this->tickets()->count();
    }

}