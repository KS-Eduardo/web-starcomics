<h1 id="hisTitulo">Pedidos</h1>
<!--este div contiene el fondo, la fecha y latabla,
    este se tiene que crear segun la fecha
    osease, creo que desde aqui va un ciclo-->
<div id="generalHis">
@php
    $ventaAnterior='';

@endphp
@php
                $mensaje=0;
            @endphp
@foreach ($pedidos as $p)
@php
$mensaje++;
@endphp

        @php
            $venta=$p->idVenta;
        @endphp
        @if ($venta== $ventaAnterior)

        @else
        <div class="acomodarDesmadre">
            <span class="fechaHis">Numero de la venta: {{$p->idVenta}}</span>
            @if ($p->estado==0)
            <div  class="formsVer">
                <form method="post" action="/Pedidos/cancelar/{{$p->idVenta}}">
                    @csrf
                    <input id="ver" type="submit" value="Cancelar" placeholder=""/>
                </form>
            </div>

            @else

            @endif

        </div>

        @php
            $ventaAnterior=$p->idVenta;
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
                        <img style="width: 100%; border-radius: 15px;" src="/storage/{{$p->portada}}">
                    </div>
                    <!--Este div grandote contiene los detalles del producto-->
                    <div>
                        <span class="titleCarP">{{$p->nombre}}</span>
                        <!--div flexible pra acomodar las weas-->
                        <div style="display: flex; margin: 10px;">
                            <!--contenedor de la fecha y estado del producto-->
                            <div class="datosHis" style="font-size: 15px; margin: 10px">
                                <span>Detalles del producto</span><br>
                                <!--Aqui se tiene que cambiar el estado,
                                yo digo que tambien se le cambie de color para
                                que se vea mamalon-->
                                @php
                                    switch ($p->estado) {
                                        case '0':
                                            $estado="No enviado";
                                            break;
                                        case '1':
                                            $estado="Encamino";
                                        break;
                                        case '2':
                                            $estado="No enviado";
                                            break;

                                        default:
                                            $estado="Cancelado";
                                            break;
                                    }
                                @endphp
                                <span>Estado: <span class="estado">{{$estado}}</span><br>
                                @php
                                    $fecha=$p->created_at;
                                    $nuevafecha = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
                                    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                @endphp
                                <span>Posible fecha de entrega:<br><span class="estado">{{ $nuevafecha}}</span><br>

                                <!--<span>Fecha de entrega: quita esto si quieres</span><br>-->
                            </div>

                            <!--contenedor de la direccion a donde fue entregado el producto-->
                            <div class="dircerHis" style="font-size: 15px;">
                                <span>Entregado en:</span><br>
                                @php
                                $Correo=session('user')->correo;
                                $direccion = session('user')->direccion;
                                $d = explode("_", $direccion);
                                @endphp
                                <span>{{$d[0]}} {{$d[1]}} {{$d[2]}} {{$d[3]}}<br>Señales particulares<br> {{$d[5]}}</span><br>
                            </div>

                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
@endforeach
@if ($mensaje==0)
    <h1 class="titleCar">No tienes pedidos</h1>
@else
@endif
</div>
