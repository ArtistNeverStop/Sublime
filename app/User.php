<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Traits\EagerLoadeable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Support\HasFiles;
use App\Traits\Support\EntitySerializableAttribute;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, EagerLoadeable, HasFiles, EntitySerializableAttribute;

    /**
     * The default value in db, the Resource class
     * related must declare their on constant types
     * to group their files
     *
     * @var int
     */
    const AVATAR_FILE_TYPE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_name',
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
        'is_user',
        'is_manager',
        'avatar',
        'credit'
    ];

    # ------------------------------ RELATIONS ------------------------------ #

    /**
     * The user belongs to many roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_has_role');
    }

    /**
     * The user has many requests
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany('App\Request');
    }

    /**
     * The user has many wallet
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wallet()
    {
        return $this->hasOne('App\Wallet');
    }

    /**
     * The user has many artists
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artists()
    {
        return $this->hasMany('App\Artist');
    }

    /**
     * The user has many artists
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function managedArtists()
    {
        return $this->belongsToMany('App\Artist', 'requests')->wherePivot('status', \App\Request::STATUS_ACCEPTED);
    }

    # ------------------------------ SERIALIZATION ------------------------------ #

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

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getIsUserAttribute()
    {
        return !$this->is_admin && !$this->is_staff;
    }

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getIsManagerAttribute()
    {
        return !!$this->managedArtists()->count();
    }

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getAvatarAttribute()
    {
        $avatar = $this->images()->wherePivot('type', self::AVATAR_FILE_TYPE)->first();
        return $avatar ? $avatar->url : null;
    }

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getCreditAttribute()
    {
        return $this->wallet->credit;
    }
}
