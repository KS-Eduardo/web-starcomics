<?php

namespace App\Http\Controllers;

use App\Models\historial;
use App\Http\Requests\StorehistorialRequest;
use App\Http\Requests\UpdatehistorialRequest;

class HistorialController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorehistorialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorehistorialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function show(historial $historial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function edit(historial $historial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatehistorialRequest  $request
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatehistorialRequest $request, historial $historial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial  $historial
     * @return \Illuminate\Http\Response
     */
    public function destroy(historial $historial)
    {
        //
    }
}
