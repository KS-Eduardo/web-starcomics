<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Http\Requests\StorecarritoRequest;
use App\Http\Requests\UpdatecarritoRequest;
use App\Models\productos;
use App\Models\usuarios;
use App\Models\deseos;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class CarritoController extends Controller
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
    public function insertar($idp)
    {
        $producto=productos::find($idp);
       if($producto->estado==0 || $producto->cantidad==0){

       }else{
        $carrito = new Carrito();
       $carrito->idu = session('user')->id;
       $carrito->idp = $idp;
       $carrito->save();
       }

       return redirect('carrito');
    }

    public function quitar($idp,$idu,$f)
    {
       DB::table('carritos')->where('idp',$idp)->where('idu',$idu)->where('created_at',$f)->delete();
       return redirect('carrito');
    }

    public function insertarD($idp)
    {

       $carrito = new deseos();
       $carrito->idu = session('user')->id;
       $carrito->idp = $idp;
       $carrito->save();

       return redirect('deseos');
    }

    public function quitarD($idp,$idu,$f)
    {
       DB::table('deseos')->where('idp',$idp)->where('idu',$idu)->where('created_at',$f)->delete();
       return redirect('deseos');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecarritoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecarritoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecarritoRequest  $request
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecarritoRequest $request, carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrito $carrito)
    {
        //
    }
}
