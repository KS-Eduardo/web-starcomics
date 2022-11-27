    <!-- parte izquierda-->
    <div id="adminHome">
        <div class="IZQ" method="post">
            <form action="" class="menuIzquierda">
                <a href="{{URL::to('/admin/Agregar')}}"><input type="button" value="Agregar"></a><br>
                <a href="{{URL::to('/admin/Pedidos')}}"><input type="button" value="Pedidos" style="background-color: rgb(272, 170, 31); color: black;"></a><br>
                <a href="{{URL::to('/admin/Usuarios')}}"><input type="button" value="Usuarios"></a><br>
                <a href="{{URL::to('/admin/Existencias')}}"><input type="button" value="Existencias"></a><br>
                <a href="{{URL::to('/admin/Movimientos')}}"><input type="button" value="Movimientos"></a><br>
            </form>
        </div>

        <!-- parte derecha-->
        <div id="DER">
            <div style="width: 830px; height: 800px; overflow:auto;">
                <p class="AdminText">Pedidos</p>
                <table style="width: 800px; overflow:auto;">
                    @php
                        $fecha="";
                        $R=false;

                         $venta="";



                    @endphp
                      <!--por fecha-->
                    @foreach ($pedidos as $p)
                    @if ($fecha==$p->created_at)
                    @else



                    @endif
                   <!--logica-->
                   @php
                        if($fecha==$p->created_at){

                        }else{
                            $fecha=$p->created_at;
                        }
                    @endphp
                    <tr>
                        <td>
                            <!--por pedido-->
                            @if ($venta==$p->idVenta)


                            @else
                                 <div class="pedidosRow">
                                        @php
                                            $direccion = $p->direccion;
                                            $d = explode("_", $direccion);
                                        @endphp
                                        <p class="AdminText" style="font-size: 18px; top:10px; float: left;">Pedido de: {{$p->correo}}</p>
                                        <p class="AdminText" style="font-size: 18px; top:10px; float: right;">Fecha de emision: {{$p->created_at}}</p>
                                        <br>
                                        <br>
                                        <p class="AdminText" style="font-size: 18px; top:10px;">Direccion de entrega: </p>
                                        <p class="AdminText" style="font-size: 18px; top:10px;">{{$d[0]}} {{$d[1]}} {{$d[2]}} {{$d[3]}}</p>
                                        <div class="pedidosRow" style="width: 380px; height: 200px; background-color:rgb(17, 67, 88); float: left; left: 10px;">
                                            <table>
                                                <th>
                                                    <p class="AdminText" style="font-size: 18px; top:10px; color:white;">Articulo(s):</p>
                                                </th>
                                                <!--<th>
                                                    <p class="AdminText" style="font-size: 18px; top:10px; color:white;">Cantidad: </p>
                                                </th>-->
                                                @foreach ($pedidos as $a)
                                                @if ($p->idVenta==$a->idVenta)
                                                    <tr>
                                                    <td style="width: 190px;">
                                                        <p class="AdminText" style="font-size: 18px; top:10px; color:white;">{{$a->nombre}}</p>
                                                    </td>
                                                @endif
                                                @endforeach
                                                <!-- <td style="width: 190px;">
                                                        <p class="AdminText" style="font-size: 18px; top:10px; color:white;">1</p>
                                                    </td>-->
                                                </tr>
                                            </table>
                                        </div>
                                            <div class="pedidosRow" style="width: 380px; height: 200px; background-color:rgb(17, 67, 88); float: right; right: 10px;">
                                                <table>
                                                    <tr style="width: 190px;">
                                                        <td style="width: 190px;">
                                                            <p class="AdminText" style="font-size: 18px; top:10px; color:white;">Estado:</p>
                                                        </td>
                                                        @switch($p->estado)
                                                            @case(0)
                                                                <td style="width: 190px;">
                                                                    <p class="AdminText" style="font-size: 18px; top:10px; color:white;">No enviado</p>
                                                                </td>

                                                                @break
                                                            @case(1)
                                                                <td style="width: 190px;">
                                                                    <p class="AdminText" style="font-size: 18px; top:10px; color:white;">Enviado</p>
                                                                </td>

                                                                @break
                                                            @case(3)
                                                                <td style="width: 190px;">
                                                                    <p class="AdminText" style="font-size: 18px; top:10px; color:white;">Entregado</p>
                                                                </td>

                                                                @break
                                                            @default
                                                                <td style="width: 190px;">
                                                                    <p class="AdminText" style="font-size: 18px; top:10px; color:white;">CANCELADO</p>
                                                                </td>

                                                        @endswitch

                                                    </tr>
                                                    <tr>
                                                        <td style="width: 190px;">
                                                            <p class="AdminText" style="font-size: 18px; top:10px; color:white;">Fecha estimada de entrega:</p>
                                                        </td>
                                                        <td style="width: 190px;">
                                                            @php
                                                                $nuevafecha = strtotime ( '+14 day' , strtotime ( $fecha ) ) ;
                                                                $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                                            @endphp
                                                            <p class="AdminText" style="font-size: 18px; top:10px; color:white;">{{$nuevafecha}}</p>
                                                        </td>
                                                        <td style="width: 190px;">
                                                            @if ($p->estado==1)
                                                                <form method="post" action="/admin/Pedidos/entregar/{{$p->idVenta}}">
                                                                @csrf
                                                                    <input name="buscarusuario" id="subProdFact"  class="" type="submit" value="Entregado" placeholder="" style="left: 25%; top: 10px;"/></a>
                                                                </form>

                                                            @else
                                                                <form method="post" action="/admin/Pedidos/enviar/{{$p->idVenta}}/{{$p->idUsuario}}">
                                                                @csrf
                                                                    <input name="buscarusuario" id="subProdFact"  class="" type="submit" value="Enviar" placeholder="" style="left: 25%; top: 10px;"/></a>
                                                                </form>
                                                            @endif


                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>

                                    </div>
                                    <div class="dircerHis" style="font-size: 15px;">
                                        <span>Entregado en:</span><br>
                                        <span>{{$d[5]}}</span><br>
                                    </div>
                                </div>
                            @endif
                            <!--logica-->
                            @php
                                if($venta==$p->idVenta){

                                }else{
                                    $venta=$p->idVenta;
                                    $R==true;
                                }
                            @endphp
                            <!--logica-->


                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
