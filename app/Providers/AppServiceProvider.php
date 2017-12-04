<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\File;
use App\Ticket;
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
        Ticket::creating(function ($ticket) {
            if (!$ticket->uid) {
                $ticket->uid = str_random(5);
            }
        });
        Ticket::created(function ($ticket) {
            if ($ticket->artistPlace && $ticket->artistPlace->persons_remeaning === 0) {
                foreach ($ticket->artistPlace->tickets as $ticket) {
                    $ticket->user->wallet->update([
                        'credit' => $ticket->user->wallet->credit - $ticket->artistPlace->price_per_person,
                    ]);
                }
            }
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
