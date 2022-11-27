    <!-- parte izquierda-->
    <div id="adminHome">
        <div class="IZQ" method="post">
            <form action="" class="menuIzquierda">
                <a href="{{URL::to('/admin/Agregar')}}"><input type="button" value="Agregar"></a><br>
                <a href="{{URL::to('/admin/Pedidos')}}"><input type="button" value="Pedidos"></a><br>
                <a href="{{URL::to('/admin/Usuarios')}}"><input type="button" value="Usuarios"></a><br>
                <a href="{{URL::to('/admin/Existencias')}}"><input type="button" value="Existencias" style="background-color: rgb(272, 170, 31); color: black;"></a><br>
                <a href="{{URL::to('/admin/Movimientos')}}"><input type="button" value="Movimientos"></a><br>
            </form>
        </div>

        <!-- parte derecha-->
        <div id="DER">
            <p class="AdminText">Existencias</p>
            <table>
                <tr>
                    <td>
                        <div class="pedidosRow" style="width: 400px; overflow: auto;">
                            <table>
                                <tr>
                                    @foreach ($productos as $p)
                                    <div class="usuarioDiv" onclick="pulsar('{{$p->nombre}}')">
                                        <p class="inpTeFormato">{{$p->nombre}}  {{$p->codigo}}</p>
                                    </div>
                                    @endforeach
                                </tr>
                            </table>
                            <script>
                                function pulsar(producto) {
                                  console.log(producto);
                                  let barra = document.getElementById("subNombreProd");
                                  barra.value= producto;
                                }
                            </script>
                        </div>
                    </td>
                    <td>

                        <div class="pedidosRow" style="width: 400px;">
                            <form enctype="multipart/form-data" class="logRegis" method="post" action="/admin/Existencias/buscar" name="formProducto" width="600px" height="800px">
                                @csrf
                            <p class="AdminText">Buscar por código:</p>
                            <input  name="codigobuscar" id = "subNombreProdA" class="inpTeFormato" type="text" value="" placeholder="Código" style="top: 5px;"/>

                            <p class="AdminText">Buscar por nombre:</p>
                            <input  name="nombrebuscar" id = "subNombreProdB" class="inpTeFormato" type="text" value="" placeholder="Nombre" style="top: 5px;"/>

                            <input id="subProd"  class="formaReg" type="submit" value="Buscar" placeholder="Buscar" style="left: 22%; top:10px;"/>
                            </form>
                            <form enctype="multipart/form-data" class="logRegis" method="post" action="/admin/Existencias/modificar" name="formProducto" width="600px" height="800px" id="existenMod">
                            @csrf
                            <input readonly  required  name="nombreProd" id = "subNombreProd" class="inpTeFormato" type="text" value="" placeholder="Producto" style="top: 10px;"/>
                            <input id="subProd"  class="formaReg" type="submit" value="Modificar" placeholder="Modificar" style="left: 19%;"/></a>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        var form = document.getElementById("existenMod");
         form.onsubmit= function(e){
           let producto = document.getElementById("subNombreProd").value;
           let errores ="";

           if(producto == "" || producto == null){
               errores += "Debe seleccionar un producto";
           }

           if(errores != ""){
                        //alert(errores);
                        swal({
                              title:"Error",
                              text: errores,
                              icon: "warning",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                        e.preventDefault();
                    }

          /* if(errores != ""){
              alert(errores);
              e.preventDefault();
           }*/
         }
   </script>
