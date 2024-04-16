<?php

namespace App\Http\Controllers;

use App\Models\MachineryPart;
use Illuminate\Http\Request;

class MachineryPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machineryparts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $part = MachineryPart::create($request->all());
        return  redirect()->route('type.index')->with('info', 'Repuesto creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function show(MachineryPart $machineryPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function edit(MachineryPart $machineryPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MachineryPart $machineryPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MachineryPart  $machineryPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(MachineryPart $machineryPart)
    {
        //
    }
}
