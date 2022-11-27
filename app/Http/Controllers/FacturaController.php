<?php

namespace App\Http\Controllers;

use App\Models\factura;
use App\Http\Requests\StoreproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FacturaController extends Controller
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
    public function create(StoreproductosRequest $request)
    {
        $nfactura=$request['noFactProd'];
        $fecha=$request['fechaProd'];
        $total=$request['total'];
        $usuario=session('user')->id;
        $proveedor=$request['provProd'];
        $factura=new factura();
        $factura->id=$nfactura;
        $factura->fecha=$fecha;
        $factura->total=$total;
        $factura->idUsuario=$usuario;
        $factura->proveedor=$proveedor;
        $factura->save();
        return redirect('/admin/Agregar');
    }
    public function buscar(StoreproductosRequest $request)
    {
        $b=$request['fechaProd'];
        $sql = "SELECT facturas.id,proveedor,total,fecha,correo FROM facturas
        INNER JOIN usuarios
        ON facturas.idUsuario = usuarios.id
        WHERE fecha LIKE '%$b%';";
        $factura=DB::select($sql);
        return view('administracionFacturas',['facturas' => $factura]);
    }
    public function capturar(StoreproductosRequest $request)
    {
        $b=$request['nombreusuario'];
        $request->session()->put('numf',$b);
        if($b != null){
            return view('administracionAgregar');
        }
        else{
            return redirect('/admin/Agregar');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefacturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefacturaRequest  $request
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(factura $factura)
    {
        //
    }
}
