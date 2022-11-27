<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\MovimientosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentaController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\productos;
use App\Models\pedidos;
use App\Models\usuarios;
use App\Models\carrito;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;
use App\Http\Middleware\validarAdministradorMiddleware;
use App\Http\Middleware\logeadoMiddleware;
use App\Http\Middleware\registroProductoMiddleware;
use App\Http\Middleware\registroUsuariosMiddleware;
use App\Http\Middleware\valLoginMiddleware;
use App\Http\Middleware\ventaMiddleware;
use App\Http\Middleware\adminFacturasMiddleware;
use App\Http\Controllers\PedidosController;
use App\Models\factura;
use App\Models\movimientos;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(session()->has('user')){
        $usuario= session('user')->id;
        $sql="SELECT * from productos
        where genero =(SELECT genero FROM (SELECT genero,COUNT( genero ) FROM  detallesventas
        INNER JOIN ventas
        ON ventas.id = detallesventas.idVenta
        INNER JOIN historials
        ON ventas.id = historials.idVenta
        INNER JOIN productos
        ON detallesventas.idp = productos.id
        WHERE idUsuario = $usuario
        GROUP BY genero DESC
        LIMIT 1) AS g) LIMIT 5";
        $rec = DB::select($sql);
    }else{
        $sql = "SELECT id,nombre,estado,categoria,portada,cantidad,precio,genero,COUNT( idp ) AS total
    FROM  detallesventas
    INNER JOIN productos
    ON productos.id = detallesventas.idp
    GROUP BY idp
    ORDER BY total DESC
    LIMIT 5";
        $rec = DB::select($sql);

    }

    $sql = "SELECT id,nombre,estado,categoria,portada,cantidad,precio,genero,COUNT( idp ) AS total
    FROM  detallesventas
    INNER JOIN productos
    ON productos.id = detallesventas.idp
    GROUP BY idp
    ORDER BY total DESC
    LIMIT 5";
    $productos = DB::select($sql);


    $ultimos = Productos::orderBy('id','DESC')->paginate(5);
    $mangas = Productos::where('categoria','manga')->paginate(5);
    $comics = Productos::where('categoria','comic')->paginate(5);
    $figuras = Productos::where('categoria','figura')->paginate(5);
    return view('principal',['productos' => $productos],['mangas' => $mangas,'figuras' => $figuras,'comics' => $comics,'ultimos' => $ultimos,'rec' => $rec]);
});



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware([logeadoMiddleware::class])->group(function ()
{
    Route::get('/pedidos', function () {
        if(session()->has('user')){
            if(session('user')->tipo==2){
                $usuario= session('user')->id;
                $sql = "SELECT pedidos.id,portada,pedidos.estado,nombre,sinopsis,idVenta,pedidos.created_at FROM pedidos
                INNER JOIN productos
                ON pedidos.idProducto = productos.id
                INNER JOIN usuarios
                ON pedidos.idUsuario = usuarios.id
                WHERE pedidos.idUsuario = $usuario
                ORDER BY pedidos.idVenta;";
               // INNER JOIN historials
              //  ON pedidos.idUsuario = historials.idUsuario";
                $pedidos = DB::select($sql);

            }else{
                $usuario= session('user')->id;
                $sql = "SELECT pedidos.id,portada,pedidos.estado,nombre,sinopsis,idVenta,pedidos.created_at FROM pedidos
                INNER JOIN productos
                ON pedidos.idProducto = productos.id
                INNER JOIN usuarios
                ON pedidos.idUsuario = usuarios.id
                WHERE pedidos.idUsuario = $usuario
                ORDER BY pedidos.idVenta;";
                $pedidos = DB::select($sql);
            }
        }else{
            $pedidos="Inicia sesion para revisar el Carrito";
        }
        return view('pedidos',['pedidos' => $pedidos]);
    });

    Route::get('/historial', function () {
        if(session()->has('user')){
            $usuario= session('user')->id;
            $sql = "SELECT * FROM historials INNER JOIN ventas
            ON historials.idVenta = ventas.id
            INNER JOIN detallesVentas
            ON detallesventas.idVenta = id
            INNER JOIN productos
            ON detallesventas.idp = productos.id
            WHERE historials.idUsuario = $usuario
            ORDER BY time;";
            $historial = DB::select($sql);
        }else{
            $historial="Inicia sesion para revisar el Carrito";
        }
        return view('historial',['historial' => $historial]);
    });

    Route::get('/carrito', function () {
        if(session()->has('user')){
            $usuario= session('user')->id;
            $sql = "SELECT * FROM productos INNER JOIN carritos
            ON carritos.idp = productos.id
            WHERE idu = $usuario;";
            $carrito = DB::select($sql);
        }else{
            $carrito="Inicia sesion para revisar el Carrito";
        }
        return view('carrito',['carrito' => $carrito]);
    });


    Route::get('/deseos', function () {
        if(session()->has('user')){
            $usuario= session('user')->id;
            $sql = "SELECT * FROM productos INNER JOIN deseos
            ON deseos.idp = productos.id
            WHERE idu = $usuario;";
            $deseos = DB::select($sql);
        }else{
            $deseos="Inicia sesion para revisar el Carrito";
        }
        return view('deseos',['deseos' => $deseos]);
    });


    Route::get('/ticketventa/{venta}', function ($venta) {
       $correo= session('user')->correo;
       $sql = "SELECT historials.idVenta,nombre,precio,correo,time FROM historials
        INNER JOIN usuarios
        ON historials.idUsuario = usuarios.id
        INNER JOIN detallesventas
        ON detallesventas.idVenta = historials.idVenta
        INNER JOIN productos
        ON productos.id = detallesventas.idp
        WHERE correo= '$correo' AND historials.idventa = $venta";
        $ticket = DB::select($sql);
        return view('VentaTicket',['ticket'=>$ticket]);
    });

    Route::post('/Pedidos/cancelar/{id}',[PedidosController::class, 'cancelar']);

    Route::controller(CarritoController::class)->group(function () {
    Route::post('/productos/detalle/insertar/{idp}','insertar');
    Route::post('/productos/detalle/insertarD/{idp}','insertarD');
    Route::post('/carrito/quitar/{idp}/{idu}/{f}','quitar');
    Route::post('/carrito/quitarD/{idp}/{idu}/{f}','quitarD');;
    });

    Route::get('/confirmar', function () {
        return view('confirmarVenta');
    });
    Route::get('/perfilUsuario', function () {
        return view('infoUsuario');
    });
    Route::post('/historial/cerrar',[UsuariosController::class, 'cerrar']);
    Route::get('/confirmarVenta/{total}',function($total){
        if($total==160){
            return redirect('/carrito');

        }else{
            return view('confirmarventa',['total'=>$total]);
        }


    });

});
/////////////////////////////////////////////////////////////////////////////

Route::get('/catalogo/{categoria}',function($categoria){
    $producto = Productos::where('categoria',$categoria)->paginate(10);
    if ($producto)
        return view('catalogo',['productos'=>$producto],['palabra'=>$categoria]);
    else
        return abort(404,'No se encontro');
});






Route::get('/login', function () {
    return view('login');
});
Route::middleware([valLoginMiddleware::class])->group(function ()
{
    Route::post('/login_de_usuarios/Login',[UsuariosController::class, 'ingresar']);
});
Route::get('/login_de_usuarios/Login/olvidar/{correo}',[UsuariosController::class, 'olvidar']);
Route::post('/cambiarContra/{token}',[UsuariosController::class, 'cambiar']);
////////////////////////////////////////////////////////////////////////////////////////






Route::get('/olvideContraseña/{correo}', function ($correo) {
    if(session()->has('user')){
        $token=session('user')->token;
        $correo=$correo.'-'.$token;

    }
    return view('olvidecontraseña',['correo'=>$correo]);
});
Route::get('/registro', function () {
    return view('registro');
});


Route::middleware([validarAdministradorMiddleware::class])->group(function ()
{

    Route::get('/registroProducto', function () {
    return view('registroProducto');
    });
    Route::get('/admin', function () {
        return view('administracion');
    });
    Route::get('/admin/Agregar/producto', function () {
        return view('administracionAgregar');
    });
    Route::get('/admin/Modificar', function () {

        return view('administracionModificar');
    });
    Route::get('/admin/Pedidos', function () {
        $sql = "SELECT pedidos.idVenta,pedidos.idUsuario,pedidos.idProducto,pedidos.estado,correo,direccion,nombre,pedidos.created_at
        FROM pedidos
        INNER JOIN usuarios
        ON pedidos.idUsuario= usuarios.id
        INNER JOIN productos
        ON pedidos.idProducto = productos.id
        ORDER BY pedidos.idVenta;";
            $pedidos = DB::select($sql);
        return view('administracionPedidos',['pedidos' => $pedidos]);
    });

    Route::get('/admin/Usuarios', function () {
        $usuario = usuarios::all();
        return view('administracionUsuarios',['usuarios' => $usuario]);
    });
    Route::get('/admin/Existencias', function () {
        $producto = productos::all();
        return view('administracionExistencias',['productos' => $producto]);
    });
    Route::get('/admin/Movimientos', function () {

        $sql = "SELECT productos.nombre,movimientos.time,movimientos.tipo,movimientos.cantidad FROM movimientos
        INNER JOIN productos
        ON movimientos.idp = productos.id
        ORDER BY movimientos.time";
        $movimientos=DB::select($sql);
        return view('administracionMovimientos',['movimientos' => $movimientos]);
    });



        Route::get('/admin/Agregar', function () {
            $sql = "SELECT facturas.id,proveedor,total,fecha,correo FROM facturas
            INNER JOIN usuarios
            ON facturas.idUsuario = usuarios.id";
            $facturas=DB::select($sql);
            return view('administracionFacturas',['facturas' => $facturas]);
        });



    Route::get('/admin/Factura/ticket', function () {
        return view('administracionFacturasTikcket');
    });

    Route::get('admin/Factura/ticket/{factura}',function($factura){
        $sql = "SELECT facturas.id,fecha,detallesfacturas.cantidad,nombre,precio,correo FROM facturas
        INNER JOIN usuarios
        ON facturas.idUsuario = usuarios.id
             INNER JOIN detallesfacturas
        ON facturas.id = detallesfacturas.idf
        INNER JOIN productos
        ON detallesfacturas.idp = productos.id
            WHERE facturas.id = $factura;";
            $ticket = DB::select($sql);
            $contar=count($ticket);

        if ($contar>0)
            return view('administracionFacturasTikcket',['factura'=>$ticket]);
        else
           return redirect('/admin/Agregar');
    });



    Route::post('/admin/Usuarios/permiso',[UsuariosController::class, 'permiso']);
    Route::post('/admin/Usuarios/buscar',[UsuariosController::class, 'buscar']);
    Route::post('/admin/Existencias/buscar',[ProductosController::class, 'buscarAdmin']);
    Route::post('/admin/Existencias/modificar',[ProductosController::class, 'buscarmodificar']);
    Route::post('/admin/Existencias/modificarExistencias',[ProductosController::class, 'modificar']);
    Route::post('/admin/movimientos/buscar',[MovimientosController::class, 'buscar']);
    Route::middleware([adminFacturasMiddleware::class])->group(function ()
    {
    Route::post('/admin/Agregar/factura',[FacturaController::class, 'create']);
    });
    Route::post('/admin/Agregar/factura/buscar',[FacturaController::class, 'buscar']);
    Route::post('/admin/Agregar/factura/agregar',[FacturaController::class, 'capturar']);
    Route::post('/admin/Pedidos/enviar/{id}/{idu}',[PedidosController::class, 'enviar']);
    Route::post('/admin/Pedidos/cancelar/{id}',[PedidosController::class, 'cancelar']);
    Route::post('/admin/Pedidos/entregar/{id}',[PedidosController::class, 'Entregar']);







});

Route::controller(ProductoController::class)->group(function () {
    Route::get('/catalogo_productos/catalogo','catalogo');

});



Route::middleware([ventaMiddleware::class])->group(function ()
{
    Route::post('/confirmarVenta/venta/confirmar',[VentaController::class,'venta']);
});
/*Route::controller(VentaController::class)->group(function () {
    Route::post('/confirmarVenta/venta/','venta');
});*/



Route::middleware([registroProductoMiddleware::class])->group(function ()
{
    Route::post('/admin/Agregar/insertar',[ProductosController::class, 'insertar']);
});

Route::middleware([registroUsuariosMiddleware::class])->group(function ()
{
    Route::post('/alta_de_usuarios/Registrarse',[UsuariosController::class, 'insertarUsuario']);
});

Route::post('/perfilUsuario/Modificar',[UsuariosController::class, 'modificarUsuario']);


Route::post('/catalogo/buscar',[ProductosController::class, 'buscar']);
//////////////////////////////////////////////////////////////////////////////////////////
Route::get('/productos/detalle/{id}',function($id){
    $producto = Productos::find($id);
    if ($producto)
    {
        if(session()->has('user')){
            $sql = "SELECT id,nombre,categoria,portada,precio,genero,COUNT( idp ) AS total
            FROM  detallesventas
            INNER JOIN productos
            ON productos.id = detallesventas.idp
            GROUP BY idp
            ORDER BY total DESC
            LIMIT 5";
            $rec = DB::select($sql);
        }else{
            $rec = Productos::orderBy('id','DESC')->paginate(5);
        }

        return view('producto',['producto'=>$producto],['rec'=>$rec]);
    }
    else
        return abort(404,'No se encontro');
});


