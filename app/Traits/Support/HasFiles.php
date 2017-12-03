<?php

namespace App\Traits\Support;

trait HasFiles
{
    /**
     * The Model could have many files
     *
     * @return Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function files()
    {
        return $this->belongsToMany('App\File', 'resource_has_file')->withPivot('type')->orderBy('order');
    }

    /**
     * The products could have many images
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->files()->orderBy('order')->where(function ($query) {
            $query->orWhere('mime_type', 'image/jpeg');
            $query->orWhere('mime_type', 'image/gif');
            $query->orWhere('mime_type', 'image/webp');
            $query->orWhere('mime_type', 'image/svg+xml');
            $query->orWhere('mime_type', 'image/png');
        });
    }
}
