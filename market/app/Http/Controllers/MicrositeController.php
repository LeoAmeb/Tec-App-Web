<?php

namespace App\Http\Controllers;

use App\Microsite;
use Illuminate\Http\Request;

class MicrositeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('microsites.index');
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
     * @param  \App\Microsite  $microsite
     * @return \Illuminate\Http\Response
     */
    public function show(Microsite $microsite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Microsite  $microsite
     * @return \Illuminate\Http\Response
     */
    public function edit(Microsite $microsite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Microsite  $microsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Microsite $microsite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Microsite  $microsite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Microsite $microsite)
    {
        //
    }
}
