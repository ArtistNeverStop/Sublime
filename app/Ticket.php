<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'artist_available_place',
        'finish_at',
        'user_id',
    ];

     /**
     * The user belongs to many user
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artistPlace()
    {
        return $this->belongsTo('App\ArtistPlace', 'artist_available_place');
    }
}
