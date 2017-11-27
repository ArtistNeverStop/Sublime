<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    # ------------------------------ RELATIONS ------------------------------ #

    /**
     * The country has Many States
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany('App\States');
    }
}
