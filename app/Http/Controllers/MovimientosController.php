<?php

namespace App\Http\Controllers;

use App\Models\movimientos;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreusuariosRequest;
use App\Http\Requests\UpdateusuariosRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoremovimientosRequest;
use App\Http\Requests\UpdatemovimientosRequest;

class MovimientosController extends Controller
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
     * @param  \App\Http\Requests\StoremovimientosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremovimientosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function show(movimientos $movimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(movimientos $movimientos)
    {

    }
    public function buscar(Request $request)
    {

        $b=$request['fechaProd'];
        $sql = "SELECT productos.nombre,movimientos.time,movimientos.tipo,movimientos.cantidad FROM movimientos
        INNER JOIN productos
        ON movimientos.idp = productos.id
        WHERE movimientos.time LIKE '%$b%';";
        $movimientos=DB::select($sql);
         return view("administracionMovimientos",['movimientos'=>$movimientos]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemovimientosRequest  $request
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemovimientosRequest $request, movimientos $movimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(movimientos $movimientos)
    {
        //
    }
}
