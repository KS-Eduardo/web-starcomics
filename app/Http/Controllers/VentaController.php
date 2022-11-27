<?php

namespace App\Http\Controllers;

use App\Models\venta;
use App\Models\carrito;
use App\Models\usuarios;
use App\Models\productos;
use App\Models\pedidos;
use App\Models\historial;
use App\Models\detallesventa;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreventaRequest;
use App\Http\Requests\UpdateventaRequest;
use App\Http\Requests\StoreusuariosRequest;
use App\Http\Requests\UpdateusuariosRequest;


class VentaController extends Controller
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
    public function venta(StoreusuariosRequest $request)
    {
        $total=$request['total'];
        $usuario=session('user')->id;
        $sql = "SELECT * FROM productos INNER JOIN carritos
        ON carritos.idp = productos.id
        WHERE idu = $usuario;";
        $carrito = DB::select($sql);

        if($carrito==null){
            return redirect('/');

        }else{



        $venta = new venta();
        $venta->total = $total;
        $venta->save();

       /* $historial= new historial();
            $historial->idVenta=$venta->id;
            $historial->idUsuario= session('user')->id;
            $historial->save();*/
        foreach($carrito as $p){

            $detallesV = new detallesventa();
            $detallesV->idVenta=$venta->id;
            $detallesV->idp = $p->idp;
            $detallesV->save();

            $pedido = new pedidos();
            $pedido->idUsuario= session('user')->id;
            $pedido->idVenta=$venta->id;
            $pedido->idProducto = $p->idp;
            $pedido->save();

            $producto = productos::find($p->id);
            $producto->cantidad=$p->cantidad-1;
            $producto->save();

        }

        $calles=$request['calle'];
        $colonia=$request['colonia'];
        $estado=$request['estado'];
        $cp=$request['cp'];
        $particulares=$request['señas'];
        $telefono=$request['telefono'];
        $direccion=$calles .'_'. $colonia . '_' . $estado . '_' . $cp . '_' . $telefono . '_' . $particulares;

        $usuarioc=session('user')->correo;
        $consulta = Usuarios::where('correo',$usuarioc);
        $usuario=$consulta->get()->first();
        if($direccion!=$usuario->direccion){
            $usuario->direccion = $direccion;
            $usuario->save();
            $request->session()->put('user',$usuario);
        }else{

        }



       DB::table('carritos')->where('idu', session('user')->id)->delete();
       return redirect('carrito');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreventaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreventaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateventaRequest  $request
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateventaRequest $request, venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(venta $venta)
    {
        //
    }
}
