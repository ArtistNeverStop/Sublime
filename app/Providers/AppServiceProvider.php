<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\File;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::deleting(function ($user) {
            $user->files()->delete();
        });

        User::created(function ($user) {
            $user->wallet()->create([]);
        });

        /**
         * If there is a user in the session and the uploader_id
         * was not specified then set the current user as uploader.
         * @event
         */
        File::creating(function ($file) {
            $file->order = microtime(true);
            if (!$file->uploader_id && Auth::user()) {
                $file->uploader_id = Auth::user()->id;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
