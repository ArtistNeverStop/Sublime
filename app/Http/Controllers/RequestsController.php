<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\RequestStoreRequest;
use App\Request as ModelRequest;
use App\Artist;
use Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ModelRequest::with(['artist', 'user'])->get();
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
     * @param  \App\Http\Requests\RequestStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStoreRequest $request)
    {
        return Auth::user()->requests()->firstOrCreate([
            'artist_id' => Artist::firstOrCreate(['name' => $request->name])->id,
            'user_id' => Auth::user()->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $Request, ModelRequest $request)
    {
        $request->fill($Request->all());
        $request->status = $Request->input('status');
        $request->save();
        return $request->load(['user', 'artist']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelRequest $request)
    {
        $request->delete();
        return $request;
    }
}
