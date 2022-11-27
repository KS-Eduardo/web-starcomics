<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\factura;

class adminFacturasMiddleware
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

        $factura = new Factura();
       $factura->numeroFact = $request['noFactProd'];
       $factura->fecha = $request['fechaProd'];
       $factura->total = $request['total'];
       $factura->proveedor = $request['provProd'];

       $nfct =  $request['noFactProd'];
       $consulta = Factura::where('id',$nfct);
       $factUsada=$consulta->get()->first();
        //Session::get('user');

        if ($factura->numeroFact!=null && $factura->fecha!=null &&  $factura->total!=null && $factura->proveedor!=null
            && $factura->numeroFact!="" &&  $factura->fecha!=""  && $factura->total!=""  && $factura->proveedor!=""
            && !preg_match("/[$%&|<>#{}+´*]/",$factura->proveedor)  &&  strlen($factura->total)<=1000000 && strlen($factura->proveedor)<=100
            &&  $factUsada == null
            )
            return $next($request);
        else
         return redirect('/admin/Agregar');
           /*abort(403, 'Acceso denegado');
            redirect('/');*/

    }
}
