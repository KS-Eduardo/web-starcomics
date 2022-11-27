<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Hash;

class valLoginMiddleware
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

        $usuario = $request->get('correoLog');
        $password = $request->get('contraseñaLog');

        $consulta = Usuarios::where('correo',$usuario);
        $user=$consulta->get()->first();

        if ($usuario!=null && $password!=null && $user!=null
        && $usuario!="" &&  $password!=""
        && !preg_match("/[$%&|<>#{}+´*]/",$usuario)  && !preg_match("/[$%&|<>#{}+´*]/",$password)
         && Hash::check($password,$user->password))
             return $next($request);
         else{
             return redirect('/login');
         }
        //return $next($request);
    }
}
