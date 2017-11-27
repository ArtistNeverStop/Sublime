<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    # ------------------------------ RELATIONS ------------------------------ #

    /**
     * The State belongs to a Country
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
