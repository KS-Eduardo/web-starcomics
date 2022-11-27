<h1 id="hisTitulo">Historial</h1>
<!--este div contiene el fondo, la fecha y latabla,
    este se tiene que crear segun la fecha
    osease, creo que desde aqui va un ciclo-->
<div id="generalHis">
    @php
         $fechaAnterio='';


    @endphp
    @php
    $mensaje=0;
@endphp
    @foreach ($historial as $h)
    @php
        $fecha=$h->time;
        $mensaje++;
    @endphp
    @if ($fecha== $fechaAnterio)

    @else
        <div class="acomodarDesmadre">
            <span class="fechaHis">{{$h->time}}</span>
            <div class="formsVer">

               <a href="/ticketventa/{{$h->idVenta}}"> <input id="ver" type="submit" value="Ver Compra" placeholder=""/></a>

            </div>
        </div>

       @php
         $fechaAnterio=$h->time;
       @endphp
    @endif

    <!--Aqui inicia la tabla -->
    <table id="pedidos">
        <!--aqui se inicializa la fila y columna de la tabla,
            se tiene que crear una nueva fila y columna segun
            el numero de productos que se hayan comprado
            osease, aqui va otro ciclo xd-->

        <tr>
            <td>
                <!--div que tiene el contenido de toda la wea-->
                <div id="acomodarHisTable">
                    <!--div contiene la imagen del producto-->
                    <div id="imgHis">
                        <img style="width: 100%; border-radius: 15px;" src="/storage/{{$h->portada}}">
                    </div>
                    <!--Este div grandote contiene los detalles del producto-->
                    <div >
                        <span class="titleCarP">{{$h->nombre}}</span>
                        <!--div flexible pra acomodar las weas-->
                        <div style="display: flex; margin: 10px;">
                            <!--contenedor de la fecha y estado del producto-->
                            <div class="datosHis" style="font-size: 15px; margin: 10px">
                                <span>Detalles del producto</span><br>
                                <span>Precio: ${{$h->precio}}</span><br>
                               <!-- <span>Fecha de entrega: quita esto si quieres</span><br>-->
                            </div>

                            <!--contenedor de la direccion a donde fue entregado el producto-->
                            <div class="dircerHis" style="font-size: 15px; margin: 10px">
                                <span>Descripcion:</span><br>
                                <span>{{$h->sinopsis}}</span><br>
                            </div>

                            <!--contenedor de los botones, el primero es para ver el ticket de compra
                                y el otro es para volver a comprar (te redirige al producto)-->


                        </div>

                    </div>

                </div>
            </td>
        </tr>

    </table>
    @endforeach
    @if ($mensaje==0)
    <h1 class="titleCar">Aún no ha comprado productos</h1>
@else
@endif
</div>
