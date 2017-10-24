<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
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
	 * The default value in db, the Resource class
	 * related must declare their on constant types
	 * to group their files
	 *
	 * @var int
	 */
    const STATUS_REJECTED = 2, STATUS_REJECTED_STRING = 'STATUS_REJECTED';

    /**
     * The default value in db, the Resource class
     * related must declare their on constant types
     * to group their files
     *
     * @var int
     */
    const STATUS_PENDING = 0, STATUS_PENDING_STRING = 'STATUS_PENDING';

    /**
     * The default value in db, the Resource class
     * related must declare their on constant types
     * to group their files
     *
     * @var int
     */
    const STATUS_ACCEPTED = 1, STATUS_ACCEPTED_STRING = 'STATUS_ACCEPTED';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'status',
        'type',
        'artist_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'status_string',
    ];

    # ------------------------------ RELATIONS ------------------------------ #

    /**
     * The request belongs to one user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The request belongs to one artist
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    # ------------------------------ SERIALIZATION ------------------------------ #

    /**
     * Define if the user is staff of the plataform
     *
     * @return boolean
     */
    public function getStatusStringAttribute()
    {
        switch ($this->status) {
            case static::STATUS_ACCEPTED:
                return static::STATUS_ACCEPTED_STRING;
                break;
            case static::STATUS_REJECTED:
                return static::STATUS_REJECTED_STRING;
                break;
            case static::STATUS_PENDING:
                return static::STATUS_PENDING_STRING;
                break;
            default:
                return 'UNKNOWN';
                break;
        }
    }
}
