<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BuyTicketRequest;
use App\ArtistPlace;
use App\Ticket;
use Auth;

class TicketsController extends Controller
{
    /**
     * The user belongs to many user
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buy(BuyTicketRequest $request, ArtistPlace $artistplace)
    {
        return $artistplace->tickets()->create([
            'user_id' => Auth::user()->id
        ]);
    }
}

