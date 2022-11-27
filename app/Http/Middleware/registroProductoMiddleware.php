<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\productos;
use App\Models\factura;
use App\Http\Requests\StoreproductosRequest;
use Illuminate\Support\Facades\Storage;


class registroProductoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       $producto = new Productos();
       $producto->nombre = $request['nombreProd'];
       $producto->autor = $request['autorProd'];
       $producto->categoria = $request['categoriaProd'];
       $producto->genero = $request['generoProd'];
       $producto->sinopsis = $request['sinopsis'];
       $producto->codigo = $request['codigoProd'];
       $producto->cantidad = $request['cantidad'];
       $producto->precio = $request['precioProd'];
       $producto->proveedor = $request['provProd'];
       $path =   $request->file('portada');
       $producto->portada = "prueba";
        //Session::get('user');





        // para el numero de factura
        $nfactura=$request['noFactProd'];

        if ($producto->nombre!=null && $producto->autor!=null && $producto->categoria!=null
        && $producto->genero!=null && $producto->codigo!=null && $producto->cantidad!=null
        && $producto->precio!=null && $producto->portada!=null && !preg_match("/[$%&|<>{}+´*]/",$producto->nombre)
        && !preg_match("/[$%&|<>#{}+´*]/",$producto->autor) && !preg_match("/[$%&|<>#{}+´*]/",$producto->categoria)
        && !preg_match("/[$%&|<>#{}+´*]/",$producto->genero) && !preg_match("/[$%&|<>#{}+´*]/",$producto->sinopsis)
        && !preg_match("/[$%&|<>#{}+´*]/",$producto->codigo) && !preg_match("/[$%&|<>#{}+´*]/",$producto->cantidad)
        && !preg_match("/[$%&|<>#{}+´*]/",$producto->precio) && !preg_match("/[$%&|<>#{}+´*]/",$producto->proveedor)
        &&  strlen($producto->sinopsis)<=500 && $nfactura !=null
        )
            return $next($request);
        else
         return redirect('/admin/Agregar');
           /*abort(403, 'Acceso denegado');
            redirect('/');*/
    }
}
