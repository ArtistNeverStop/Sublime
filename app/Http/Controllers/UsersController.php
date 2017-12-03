<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\QueryFieldsRequest;
use App\User;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Requests\QueryFieldsRequest
     */
    public function index(QueryFieldsRequest $request)
    {
        return User::select($request->fields ?: '*')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(QueryFieldsRequest $request, $id)
    {
        return User::findOrFail($id, $request->fields ?: '*');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function me(Request $request)
    {
        return Auth::user()->load(['requests.artist']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function artists(Request $request)
    {
        return Auth::user()->managedArtists->load(['placesAvailable']);
    }

    /**
     * Remove the current user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selfDestruct(Request $request)
    {
        Auth::user()->delete();
    }
}
