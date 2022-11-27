<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Comics</title>

    <link rel="stylesheet" type="text/css" href="/css/default2.css">
   <!-- <link rel="stylesheet" type="text/css" href="/css/default2.css">-->

</head>
<body>
    <header>

        <div class="logo">
            <img class="logoT" src="/imagenes/logoT.jpg">
            <a class="logoS" href="{{URL::to('/')}}"><img src="/imagenes/logos.jpg" ></a>

        </div>
        <div class="nav">

            <a href="{{URL::to('/carrito')}}"><img src="/imagenes/carro.jpg" width="20%"></a>
            <a href="{{URL::to('/login')}}"><img src="/imagenes/cuenta.jpg" width="20%"></a>
            <a href="{{URL::to('/historial')}}"><img src="/imagenes/t.jfif" width="20%"></a>
            <a href="{{URL::to('/pedidos')}}"><img src="/imagenes/p.jfif" width="20%"></a>
            @if (session()->has('user'))
            <form method="post" action="/historial/cerrar">
                @csrf
                <input id="cerrarSesionBtn" type="submit" value="Cerrar sesion" placeholder="Cerrar sesion"/>

            </form>
            @endif

        </div>
        @if (session()->has('user'))
        @php
            $u=session('user')->correo;
        @endphp
        <p style="color: white">{{$u}}</p>
        @endif

    </header>



    <main>
        @yield('contenido')
    </main>




    <footer>
        <img class="PieImg" src="/imagenes/logoS.jpg" >

        <h5 class="PieRedes">Redes sociales</h5>

        <div class="PieRedes">
            <img src="/imagenes/facebook.png" class="imgPie">
             <img src="/imagenes/twitter.png" class="imgPie">
        </div>

        <h5 class="PiePago">Formas de pago</h5>
        <div class="PiePago">
            <img src="/imagenes/visa.png">
        </div>
    </footer>
</body>
</html>
