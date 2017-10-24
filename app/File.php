<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class File extends Model
{
	/**
	 * The default value in db, the Resource class
	 * related must declare their on constant types
	 * to group their files
	 *
	 * @var int
	 */
    const DEFAULT_TYPE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $fillable = [
        'file_path',
        'mime_type',
        'order',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'url',
    ];

    ////////////////////////////////////////////////////////////////////////////
    /*  Relations */
    ////////////////////////////////////////////////////////////////////////////

    /**
     * The file could belongsToMany Users
     * @return Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function user()
    {
        return $this->belongsToMany('App\User', 'resource_has_file', 'file_id', 'user_id');
    }

    ////////////////////////////////////////////////////////////////////////////
    /*  Serialization */
    ////////////////////////////////////////////////////////////////////////////

    /**
     * Serializa the url image of this resource 
     *
     * @return string|url
     */
    public function getUrlAttribute()
    {
        return Storage::url($this->file_path);
    }
}
