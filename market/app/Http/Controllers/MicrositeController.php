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
        $microsite = new Microsite();
        $microsite->name = $request->name;
        $microsite->description = $request->description;
        $microsite->latitude = $request->latitude;
        $microsite->length = $request->length;
        $microsite->save();
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
    public function edit($id){
        return Microsite::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Microsite  $microsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $microsite = Microsite::find($id);
        $microsite->fill($request->all());
        $microsite->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Microsite  $microsite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Microsite::findOrFail($id);
        $usuario->delete();
    }

    public function list()
    {
        return Microsite::all();
    }

}
