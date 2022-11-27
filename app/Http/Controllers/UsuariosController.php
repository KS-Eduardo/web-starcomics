<?php

namespace App\Http\Controllers;

use Session;
use App\Models\usuarios;
use App\Http\Requests\StoreusuariosRequest;
use App\Http\Requests\UpdateusuariosRequest;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\URL;
use SebastianBergmann\Environment\Console;
use App\Mail\olvidepassword;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UsuariosController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreusuariosRequest  $request
     * @return \Illuminate\Http\Response
     */


    public function insertarUsuario(StoreusuariosRequest $request)
    {
        //

        $calles=$request['calles'];
        $colonia=$request['colonia'];
        $estado=$request['estado'];
        $cp=$request['cp'];
        $particulares=$request['sparticular'];
        $telefono=$request['telefono'];
        $direccion=$calles .'_'. $colonia . '_' . $estado . '_' . $cp . '_' . $telefono . '_' . $particulares;
        $usuario = new Usuarios();
        $token=Carbon::now() ;

        $usuario->correo = $request['correo'];
        $usuario->edad = $request['edad'];
        $usuario->direccion = $direccion;
        $usuario->password = Hash::make($request['contraseña']);
        $usuario->tipo = "1";
        $usuario->token= Hash::make($token);
        $usuario->save();
        return redirect("/");/*Falta cambiar la vista aqui*/
    }
    public function modificarUsuario(StoreusuariosRequest $request)
    {
        //

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
        $usuario->direccion = $direccion;

        $usuario->save();
        $request->session()->put('user',$usuario);
        return redirect("/perfilUsuario");/*Falta cambiar la vista aqui*/
    }
    public function ingresar(Request $request)
    {
        $usuario = $request->get('correoLog');
        $password = $request->get('contraseñaLog');
        $consulta = Usuarios::where('correo',$usuario);
        $user=$consulta->get()->first();
        if ($user)
        {
            if (Hash::check($password,$user->password))
            {
                $request->session()->put('user',$user);
                return redirect("/");
            }
        }

    }
    public function cerrar(Request $request)
    {
        $request->session()->forget('user');
        return redirect("/");
    }

    public function buscar(Request $request)
    {
        $b=$request['nombreusuarioBuscar'];
      //$usuarios = Usuarios::where('correo','LIKE','%'.$b.'%')->get();
        $usuarios = usuarios::where('correo','LIKE','%'.$b.'%')->get();
        return view('administracionUsuarios',['usuarios' => $usuarios]);
    }


    public function permiso(Request $request)
    {
        $permiso=$request->get('categoriaProd');
        if($permiso=='Normal'){
            $p=1;
        }else{
            $p=2;
        }
        $usuario = $request->get('nombreusuario');
        $consulta = Usuarios::where('correo',$usuario);
        $user=$consulta->get()->first();
        $user->tipo =$p;
        $user->save();
        return redirect("/admin");
    }

    public function olvidar($correo)
    {
        $consulta = Usuarios::where('correo',$correo)->get()->first();
        $longitud =  Usuarios::where('correo',$correo)->count();
        if( $longitud>0){
        $token=$consulta->token;
        $data= [ 'subject'=>'Starcomics olvide contraseña',
        'body'=> 'Haga click en el link para restablecer su contraseña',
        'enlace'=>'http://starcomics.test/olvideContrase%C3%B1a/'.$correo.'-'.$token
        ];
        Mail::to($correo)->send(new olvidepassword($data));
        }
        return redirect('/login');

    }

    public function cambiar(Request $request,$token)
    {
        $correo=$request['correo'];
        $consulta = Usuarios::where('correo',$correo);
        $usuario=$consulta->get()->first();
        if($usuario->token==$token){
        $contra=$request['contraseñaLog'];
        $contraR=$request['contraseñaLogR'];
        if( $contra==$contraR){

            $usuario->password = Hash::make($contra);
            $usuario->save();
            if(session()->has('user')){
                return redirect('/perfilUsuario');

            }else{
                return redirect('/login');
            }

        }else{
            return redirect('/');
        }
        }else{
            return redirect('/');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateusuariosRequest  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateusuariosRequest $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuarios $usuarios)
    {
        //
    }
}
