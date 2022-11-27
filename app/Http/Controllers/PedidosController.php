<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Http\Requests\StorepedidosRequest;
use App\Http\Requests\UpdatepedidosRequest;
use App\Models\historial;
use App\Models\movimientos;
use App\Models\productos;

class PedidosController extends Controller
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
     * @param  \App\Http\Requests\StorepedidosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepedidosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(pedidos $pedidos)
    {
        //
    }

    public function enviar($id,$idu)
    {
        $pedidos= pedidos::where('idVenta',$id)->get();
         $historial= new historial();
            $historial->idVenta=$id;
            $historial->idUsuario= $idu;
            $historial->save();
        foreach($pedidos as $p){
            $p->estado=1;
            $p->save();
            $movimiento = new movimientos();
            $movimiento->idp=$p->idProducto;
            $movimiento->tipo=3;
            $movimiento->cantidad=1;
            $movimiento->save();
        }

        return redirect("/admin/Pedidos");
       //
    }
    public function cancelar($id)
    {
        $pedidos= pedidos::where('idVenta',$id)->get();
        foreach($pedidos as $p){
            $producto=productos::find($p->idProducto);
           $suma=$producto->cantidad+1;
            $producto->cantidad= $suma;
            $producto->save();
            $p->delete();

        }
        return redirect("/pedidos");
       //
    }
    public function Entregar($id)
    {
        $pedidos= pedidos::where('idVenta',$id)->get();
        foreach($pedidos as $p){
            $p->delete();
        }
        return redirect("/admin/Pedidos");
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepedidosRequest  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepedidosRequest $request, pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedidos $pedidos)
    {
        //
    }
}
