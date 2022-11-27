<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\factura;
use App\Models\movimientos;
use App\Models\detallesfactura;
use App\Http\Requests\StoreproductosRequest;
use App\Http\Requests\UpdateproductosRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class ProductosController extends Controller
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
    public function catalogo()
    {

    }
    public function insertar(StoreproductosRequest $request)
    {

        $nombre=$request['nombreProd'] ;
        $codigo=$request['codigoProd'] ;
        $productos = productos::where('nombre',$nombre)->where('codigo',$codigo);
        $longitud = productos::where('nombre',$nombre)->where('codigo',$codigo)->count();
        if( $longitud>0){
            $producto=$productos->get()->first();
            $producto->cantidad= ($producto->cantidad+$request['cantidad']);
            $producto->save();

        }else{
        $precio=round($request['precioProd']*1.46) ;
       $producto = new Productos();
       $producto->nombre = $nombre;
       $producto->autor = $request['autorProd'];
       $producto->categoria = $request['categoriaProd'];
       $producto->genero = $request['generoProd'];
       $producto->sinopsis = $request['sinopsis'];
       $producto->codigo = $codigo;
       $producto->cantidad = $request['cantidad'];
       $producto->precio = $precio;
      // $producto->proveedor = $request['provProd'];
       $path = Storage::disk('public')->put('img', $request->file('portada'));
       $producto->portada = $path;
       $producto->save();
    }
       $nfactura=$request['noFactProd'];
       $detallesfactura = new detallesfactura();
       $detallesfactura->idf=$nfactura;
       $detallesfactura->idp=$producto->id;
       $detallesfactura->cantidad=$request['cantidad'];
       $detallesfactura->save();
       $movimiento = new movimientos();
       $movimiento->idp=$producto->id;
       $movimiento->tipo=1;
       $movimiento->cantidad=$request['cantidad'];;
       $movimiento->save();
       return view('administracionAgregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        $sql = 'SELECT * FROM productos';
        $productos = productos::select($sql);
        return view($productos);
    }

    public function buscar(Request $request){
        $b=$request['Buscar'];
       // $sql = "SELECT  * FROM productos WHERE nombre LIKE '%mo%'";
        $productos = productos::where('nombre','LIKE','%'.$b.'%')->paginate(10);
        //$productos = productos::all();
        return view("catalogo",['productos'=>$productos],['palabra'=>$b]);

    }

    public function buscarAdmin(Request $request){
        $n=$request['nombrebuscar'];
        $c=$request['codigobuscar'];
       // $sql = "SELECT  * FROM productos WHERE nombre LIKE '%mo%'";
       if($n != null && $c == null ){
        $productos = productos::where('nombre','LIKE','%'.$n.'%')->get();
       }
       if($n == null && $c != null ){
        $productos = productos::where('codigo','=',$c)->get();
       }
       if($n == null && $c == null ){
        $productos = productos::where('nombre','LIKE','%'.$n.'%')->orWhere('codigo','=',$c)->get();
       }
       if($n != null && $c != null ){
        $productos = productos::where('nombre','LIKE','%'.$n.'%')->orWhere('codigo','=',$c)->get();
       }
       // $productos = productos::where('nombre','LIKE','%'.$n.'%')->orWhere('codigo','=',$c)->get();
        //$productos = productos::all();
        return view("administracionExistencias",['productos'=>$productos]);

    }
    public function buscarmodificar(Request $request){
        $c=$request['nombreProd'];
       // $sql = "SELECT  * FROM productos WHERE nombre LIKE '%mo%'";
        $productos = productos::where('nombre','=',$c)->get();
        //$p=$productos->get()->first();

        //$productos = productos::all();
        return view("administracionModificar",['productos'=>$productos]);

    }
    public function modificar(Request $request){
        $cantidad=$request['cantidadactual'];
        $estado=$request['estado'];
        $id=$request['id'];
        $consulta = productos::where('id',$id);
        $producto=$consulta->get()->first();
        //$p=$productos->get()->first();
        $cantidadactual=$producto->cantidad;
        $cantidadmov=$cantidadactual - $cantidad;
        $producto->cantidad=$cantidad;
        if($estado=="Disponible"){
            $producto->estado=1;
        }else{
            $producto->estado=0;
        }

        $producto->save();

        $movimiento = new movimientos();
        $movimiento->idp=$id;
        if($cantidad==$cantidadactual){
            $movimiento->tipo=0;
        }else{
            $movimiento->tipo=2;
        }

        $movimiento->cantidad=$cantidadmov;
        $movimiento->save();


        //$productos = productos::all();
        return redirect('/admin/Existencias');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductosRequest  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductosRequest $request, productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(productos $productos)
    {
        //
    }
}
