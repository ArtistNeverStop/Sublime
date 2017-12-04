<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $fillable = [
        'credit',
        'user_id',
        // 'is_user',
        // 'is_manager',
        // 'avatar',
        // 'image_url'
    ];

    /**
     * The user belongs to many roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

        /**
     * The user belongs to many roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recharges()
    {
        return $this->hasMany('App\Recharge');
    }
}
