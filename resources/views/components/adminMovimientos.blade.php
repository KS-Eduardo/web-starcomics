    <!-- parte izquierda-->
    <div id="adminHome">
        <div class="IZQ" method="post">
            <form action="" class="menuIzquierda">
                <a href="{{URL::to('/admin/Agregar')}}"><input type="button" value="Agregar"></a><br>
                <a href="{{URL::to('/admin/Pedidos')}}"><input type="button" value="Pedidos"></a><br>
                <a href="{{URL::to('/admin/Usuarios')}}"><input type="button" value="Usuarios"></a><br>
                <a href="{{URL::to('/admin/Existencias')}}"><input type="button" value="Existencias"></a><br>
                <a href="{{URL::to('/admin/Movimientos')}}"><input type="button" value="Movimientos" style="background-color: rgb(272, 170, 31); color: black;"></a><br>
            </form>
        </div>

        <!-- parte derecha-->
        <div id="DER">
            <p class="AdminText">Movimientos</p>
            <table>
                <tr>
                    <div class="pedidosRow" style="width: 800px; height: 140px;">
                        <form enctype="multipart/form-data" method="post" action="/admin/movimientos/buscar" name="formProducto" width="600px" height="800px">
                            @csrf
                        <input required  name="fechaProd" id = "subDatosFactProd1" class="inpTeFormato" type="date" value="" placeholder="Fecha" style="top: 10px; width:780px; left: 10px;"/>
                        <input name="buscarusuario" id="subProd"  class="formaReg" type="submit" value="Buscar producto por fecha" placeholder="Eliminar usuario" style="left: 25%; top: 10px;"/>
                        </form>
                    </div>
                </tr>
                <tr>

                    <div class="pedidosRow" style="width: 800px; height: 460px; width: 800px; overflow: auto;">
                        <div style="height: 50px; width: 800px; display: table;">
                            <p class="inpTeFormato" style="left: 10px; float: left; position: relative;">Producto</p>
                            <p class="inpTeFormato" style="left: 100px; float: left; position: relative;">Cantidad</p>
                            <p class="inpTeFormato" style="left: 200px; float: left; position: relative;">Tipo</p>
                            <p class="inpTeFormato" style="left: 320px; float: left; position: relative;">Modificacion</p>
                        </div>
                        <!-- aaa este es el renglon -->
                        @php

                        @endphp
                        @foreach ($movimientos as $m)
                            <div style="height: 30px; width: 800px; top: 10px; position: relative;">
                                <div class="usuarioDiv" style="left: 10px; width: 185px;float: left;">
                                    <p style="overflow: auto;" class="inpTeFormato">{{$m->nombre}}</p>
                                </div>
                                <div class="usuarioDiv" style="left: 20px; width: 185px; margin: 0; float: left;">
                                    <p style="text-overflow: ellipsis;  overflow: hidden;" class="inpTeFormato">{{$m->cantidad}}</p>
                                </div>
                                <div class="usuarioDiv" style="left: 30px; width: 185px; margin: 0; float: left;">
                                    @php
                                        switch ($m->tipo) {
                                            case '0':
                                                $tipo='C. Estado';
                                                break;

                                            case '1':
                                                $tipo='Entrada';
                                                break;

                                            case '2':
                                                $tipo='Salida';
                                                break;

                                            case '3':
                                                $tipo='Venta';
                                                break;

                                        }

                                    @endphp
                                    <p class="inpTeFormato">{{$tipo}}</p>
                                </div>
                                <div class="usuarioDiv" style="left: 40px; width: 185px; margin: 0; float: left;">
                                    <p style="text-overflow: ellipsis;  overflow: hidden;" class="inpTeFormato">{{$m->time}}</p>
                                </div>
                            </div>
                        @endforeach
                        <div style="height: 30px; width: 800px; top: 10px; position: relative;">
                            <div class="usuarioDiv" style="left: 10px; width: 96.5%;float: left;background-color: #d9d9d9;">
                                <p  ></p>
                            </div>

                        </div>

                    </div>
                </tr>
            </table>
        </div>
    </div>
