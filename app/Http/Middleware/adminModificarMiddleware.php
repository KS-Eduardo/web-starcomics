<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\productos;
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
       $producto->cantidad = $request['cantidad'];

        //Session::get('user');

        if ($producto->nombre!=null && $producto->cantidad!=null)
            return $next($request);
        else
         return redirect('/admin/Agregar');
           /*abort(403, 'Acceso denegado');
            redirect('/');*/
    }
}
