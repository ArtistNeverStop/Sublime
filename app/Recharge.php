<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge extends Model
{
    protected $fillable = [
        'wallet_id',
        'amount',
        'payment_id',
    ];

        /**
     * The user belongs to many roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
}
