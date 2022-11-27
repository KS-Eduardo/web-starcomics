    <!-- parte izquierda-->
    <div id="adminHome">
        <div class="IZQ" method="post">
            <form action="" class="menuIzquierda">
                <a href="{{URL::to('/admin/Agregar')}}"><input type="button" value="Agregar"></a><br>
                <a href="{{URL::to('/admin/Pedidos')}}"><input type="button" value="Pedidos"></a><br>
                <a href="{{URL::to('/admin/Usuarios')}}"><input type="button" value="Usuarios" style="background-color: rgb(272, 170, 31); color: black;"></a><br>
                <a href="{{URL::to('/admin/Existencias')}}"><input type="button" value="Existencias"></a><br>
                <a href="{{URL::to('/admin/Movimientos')}}"><input type="button" value="Movimientos"></a><br>
            </form>
        </div>

        <!-- parte derecha-->
        <div id="DER">
            <p class="AdminText">Usuarios</p>
            <table>
                <tr>
                    <td>
                        <div class="pedidosRow" style="width: 400px; overflow: auto;">
                            <table>
                                <tr>
                                    @foreach ($usuarios as $u)
                                    <div class="usuarioDiv" onclick="pulsar('{{$u->correo}}')">
                                        <p class="inpTeFormato">{{$u->correo}}</p>
                                    </div>
                                    @endforeach

                                </tr>
                            </table>
                            <script>
                                function pulsar(usuario) {
                                  console.log(usuario);
                                  let barra = document.getElementById("subNombreProd");
                                  barra.value= usuario;
                                }
                            </script>
                        </div>
                    </td>
                    <td>
                        <div class="pedidosRow" style="width: 400px; height: 350px;">
                            <p class="AdminText">Tipo de usuario:</p>
                            <form enctype="multipart/form-data" method="post" action="/admin/Usuarios/buscar" name="formProducto" width="600px" height="800px">
                                @csrf
                            <input name="buscarusuario" id="subProd"  class="formaReg" type="submit" value="Buscar usuario" placeholder="Eliminar usuario" style="left: 15%;"/>
                            <input  name="nombreusuarioBuscar" id = "subNombreProd2" class="inpTeFormato" type="text" value="" placeholder="Buscar"/>
                            </form>
                            <form enctype="multipart/form-data" method="post" action="/admin/Usuarios/permiso" name="formProducto" width="600px" height="800px">
                            @csrf
                            <input   readonly required name="nombreusuario" id = "subNombreProd" class="inpTeFormato" type="text" value="" placeholder="Usuario seleccionado"/>
                            <select required name="categoriaProd" id = "subSelectProd" class="inpTeFormato">
                                <!-- Opciones de la lista -->
                                <option value="Normal" selected>Normal</option> <!-- Opción por defecto -->
                                <option value="Administrador">Administrador</option>
                            </select>
                            <input id="subProd"  class="formaReg" type="submit" value="Cambiar permisos" placeholder="Cambiar permisos" style="left: 12%;"/>
                            </form>
                           <!-- <input id="subProd"  class="formaReg" type="submit" value="Eliminar usuario" placeholder="Eliminar usuario" style="left: 15%;"/>
                           --> </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
