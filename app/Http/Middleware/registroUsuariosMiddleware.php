<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\usuarios;
use App\Http\Requests\StoreproductosRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class registroUsuariosMiddleware
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
        $calles=$request['calles'];
        $colonia=$request['colonia'];
        $estado=$request['estado'];
        $cp=$request['cp'];
        $particulares=$request['sparticular'];
        $telefono=$request['telefono'];
        $direccion=$calles .'_'. $colonia . '_' . $estado . '_' . $cp . '_' . $telefono . '_' . $particulares;
        $usuario = new Usuarios();

        $usuario->correo = $request['correo'];
        $usuario->edad = $request['edad'];
        $usuario->direccion = $direccion;
        $usuario->password = Hash::make($request['contraseña']);
        $usuario->tipo = "1";

        $consulta = Usuarios::where('correo',$usuario);
        $user=$consulta->get()->first();

        //Session::get('user');

        if ($usuario->correo!=null && $usuario->edad!=null && $usuario->direccion!=null && $user == null
         && $usuario->password!=null && $usuario->tipo!=null && $usuario->correo!="" && $usuario->edad!="" && $usuario->direccion!=""
         && $usuario->password!="" && $usuario->tipo!=""
         && filter_var($usuario->correo,FILTER_VALIDATE_EMAIL) &&  !preg_match("/[$%&|<>#{}+´*]/",$usuario->correo) && !preg_match("/[$%&|<>#{}+´*]/",$usuario->edad)
         && !preg_match("/[$%&|<>#{}+´*]/",$usuario->direccion) && !preg_match("/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/",$usuario->password)
         &&  strlen($usuario->correo)<=100 && strlen($usuario->password)<=255 &&  strlen($usuario->direccion)<=1000
         )
            return $next($request);
        else
         return redirect('registro');
           /*abort(403, 'Acceso denegado');
            redirect('/');*/
    }
}
