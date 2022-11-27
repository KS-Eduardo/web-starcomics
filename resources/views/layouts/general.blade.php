<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Comics</title>

    <link rel="stylesheet" type="text/css" href="/css/default2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Codigo tumbado de w3schools -->

   <!-- <link rel="stylesheet" type="text/css" href="/css/default2.css">-->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>
    <header>
        <section>
            <div class="logo">
                <a class="logoS" href="{{URL::to('/')}}"><img src="/imagenes/logo.png" width="175px"></a>

            </div>

            <div class="nav">

                <a href="{{URL::to('/carrito')}}"><img src="/imagenes/carrito.png" width="75px" style="padding: 10px"></a>
            @if (session()->has('user'))
                <a href="{{URL::to('/perfilUsuario')}}"><img src="/imagenes/cuenta.png" width="75px" style="padding: 10px"></a>
            @else
                <a href="{{URL::to('/login')}}"><img src="/imagenes/cuenta.png" width="75px" style="padding: 10px"></a>
            @endif
                <a href="{{URL::to('/historial')}}"><img src="/imagenes/historial.png" width="75px" style="padding: 10px"></a>
                <a href="{{URL::to('/pedidos')}}"><img src="/imagenes/pedidos.png" width="75px" style="padding: 10px"></a>
                <!--if (session()->has('user'))
                <form method="post" action="/historial/cerrar">
                    csrf
                    <input id="cerrarSesionBtn" type="submit" value="Cerrar sesion" placeholder="Cerrar sesion"/>

                </form>
                endif
                -->

            </div>
        </section>

        <section>
            @if (session()->has('user'))
            @php
                $u=session('user')->correo;
            @endphp
            <div class="cerrarSesionMenuTOP">
                <form method="post" action="/historial/cerrar">
                    @csrf
                    <button id="cerrarSesionBtn" type="submit">Cerrar sesión</button>
                    <p style="color: white; float: right; position: relative; right:10%; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:15px; top:10%;">Usuario: {{$u}}</p>
                </form>
                <br><br><br>
                @if (session('user')->tipo==2)
                    <a href="/admin/">  <input  id = "cerrarSesionBtn" type="submit" value="Administrador" placeholder="Buscar"/></a>
                    @endif
            </div>
            @else
            <p style="color: white; float: right; position: relative; right:10%; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size:15px; top:10%;">Sesion no iniciada.</p>
            @endif
        </section>
    </header>



    <main>
        @yield('contenido')
    </main>




    <footer>
        <div class="innerFooter" style="font-family: Arial, Helvetica, sans-serif; margin-top: 80px;">
            <img class="PieImg" src="/imagenes/logo.png" >

            <div class="PieRedesA">
                <h5 class="PieRedes">Redes sociales</h5>

                <div class="PieRedes">
                    <img src="/imagenes/facebook.png" class="imgPie">
                    <img src="/imagenes/twitter.png" class="imgPie">
                </div>
            </div>

            <div class="PiePagoA">
                <h5 class="PiePago">Formas de pago</h5>
                <div class="PiePago">
                    <img src="/imagenes/visa.png">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
