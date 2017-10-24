<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The role to manage products in connect_manage permissions
     *
     * @const string
     */
    const ADMIN = 'admin';
    
    /**
     * The role to manage products in connect_manage permissions
     *
     * @const string
     */
    const STAFF = 'staff';

    /**
     * The user belongsToMany roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\User', 'user_has_role');
    }
}
