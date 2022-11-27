<body onload='getDate();'>
    <div id="adminHome">
        <!-- parte izquierda-->
        <div class="IZQ" method="post">
            <form action="" class="menuIzquierda">
                <a href="{{URL::to('/admin/Agregar')}}"><input type="button" value="Agregar"></a><br>
                <a href="{{URL::to('/admin/Pedidos')}}"><input type="button" value="Pedidos"></a><br>
                <a href="{{URL::to('/admin/Usuarios')}}"><input type="button" value="Usuarios"></a><br>
                <a href="{{URL::to('/admin/Existencias')}}"><input type="button" value="Existencias"></a><br>
                <a href="{{URL::to('/admin/Movimientos')}}"><input type="button" value="Movimientos"></a><br>
            </form>
        </div>

        <!-- parte derecha-->
        <div class="DER">
            @php
                $u=session('user')->correo;
            @endphp
            <!--Span con id: usuario, el contenido se reemplaza con el nombre de usuario de quien este logueado-->
            <span class="AdminText">Bienvenido, <span id="usuario">{{$u}}</span> </span> <br>
            <img src="/imagenes/logo.png" id="logoChido"> <br>
            <!--Span con id: fecha, se reemplaza el contenido con la fecha actual-->
            <span id="fecha" class="AdminText">Miercoles de septiembre del 2022</span>
        </div>

        <script>
            function getDate(){
                n =  new Date();
                y = n.getFullYear();
                m = n.getMonth() + 1;
                d = n.getDate();

                switch(m){
                    case 1: m = 'Enero'; break;
                    case 2: m = 'Febrero'; break;
                    case 3: m = 'Marzo'; break;
                    case 4: m = 'Abril'; break;
                    case 5: m = 'Mayo'; break;
                    case 6: m = 'Junio'; break;
                    case 7: m = 'Julio'; break;
                    case 8: m = 'Agosto'; break;
                    case 9: m = 'Septiembre'; break;
                    case 10: m = 'Octubre'; break;
                    case 11: m = 'Noviembre'; break;
                    case 12: m = 'Diciembre'; break;
                    default: break;
                }

                document.getElementById("fecha").innerHTML = "Hoy es " + d + " de " + m + " del " + y;
            }
        </script>
    </div>
 </body>   