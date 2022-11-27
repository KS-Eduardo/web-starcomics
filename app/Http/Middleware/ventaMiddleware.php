<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\venta;

use App\Models\usuarios;

class ventaMiddleware
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
        $venta = new venta();
        $venta->total = $request['total'];

        $totaTemp = $request['total'];

        $calles=$request['calle'];
        $colonia=$request['colonia'];
        $estado=$request['estado'];
        $cp=$request['cp'];
        $particulares=$request['señas'];
        $telefono=$request['telefono'];
        $direccion=$calles .'_'. $colonia . '_' . $estado . '_' . $cp . '_' . $telefono . '_' . $particulares;

        if ($calles!=null && $colonia!=null && $estado!=null && $cp!=null && $particulares!=null && $telefono!=null  && $venta->total!=null
            && $calles!="" && $colonia!="" && $estado!="" && $cp!="" && $particulares!="" && $telefono!=""  && $venta->total!=""
        && !preg_match("/[$%&|<>#{}+´*]/",$direccion) &&  strlen($direccion)<=1000)
        return $next($request);
    else
    return redirect('/');
       /*abort(403, 'Acceso denegado');
        redirect('/');*/

    }
}
