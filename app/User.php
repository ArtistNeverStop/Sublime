<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Traits\EagerLoadeable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, EagerLoadeable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The relations that can be Eager Loaded
     *
     * @var array
     */
    protected $queryableRelations = [
        'roles',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'is_admin',
        'is_staff',
        // 'avatar',
        // 'image_url'
    ];

    /**
     * The user belongsToMany roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_has_role');
    }

    /**
     * Define if the user is the plataform admin
     *
     * @return boolean
     */
    public function getIsAdminAttribute()
    {
        return !!$this->roles()->where('name', Role::ADMIN)->count();
    }

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getIsStaffAttribute()
    {
        return !!$this->roles()->where('name', Role::STAFF)->count();
    }
}
