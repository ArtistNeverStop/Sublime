<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Support\HasFiles;
use App\Traits\Support\EntitySerializableAttribute;

class Artist extends Model
{
    use HasFiles, EntitySerializableAttribute;

    /**
     * The default value in db, the Resource class
     * related must declare their on constant types
     * to group their files
     *
     * @var int
     */
    const BACKGROUND_IMAGE_FILE_TYPE = 2;

    /**
     * The default value in db, the Resource class
     * related must declare their on constant types
     * to group their files
     *
     * @var int
     */
    const AVATAR_IMAGE_FILE_TYPE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

        /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar',
        'background_image',
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

    /**
     * The user belongs to many roles
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'artist_have_genre');
    }

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getAvatarAttribute()
    {
        $avatar = $this->images()->wherePivot('type', self::AVATAR_IMAGE_FILE_TYPE)->first();
        return $avatar ? $avatar->url : null;
    }

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getBackgroundImageAttribute()
    {
        $avatar = $this->images()->wherePivot('type', self::BACKGROUND_IMAGE_FILE_TYPE)->first();
        return $avatar ? $avatar->url : null;
    }
}
