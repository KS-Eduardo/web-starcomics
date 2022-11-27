    <!-- parte izquierda-->
    <div id="adminHome">
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
        <div id="DER">
            <div id="regProducto">
                @foreach ($productos as $p)
                <form enctype="multipart/form-data" class="logRegis" method="post" action="/admin/Existencias/modificarExistencias" name="formProducto" width="600px" height="800px" id="modPerf">
                    @csrf
                    <div>
                        <p class="AdminText">Modificar producto</p>
                        <table style="width: 100%">
                            <td width="300px" id="tablaImagenProducto">
                                <div id="regProdImg">
                                    <img  id="regImg" src="/storage/{{$p->portada}}">

                                </div>                        </td>
                            <td width="300px" id="tablaDatosProducto">
                                <input readonly name="nombreProd" id = "subNombreProd" class="inpTeFormato" type="text" value="{{$p->nombre}}" placeholder="Nombre"/>
                               <!--  <input  name="autorProd" id = "subAutorProd"  class="inpTeFormato" type="text" value="{{$p->autor}}" placeholder="Autor"/>

                               <select name="generoProd" id = "subSelectProd" class="inpTeFormato">
                                     Opciones de la lista
                                    <option value="Shonen">Shonen</option>
                                    <option value="Seinen" selected>Seinen</option>  Opción por defecto
                                    <option value="Misterio">Misterio</option>
                                </select>
                               <input  id = "subGeneroProd" class="inpTeFormato" type="text" value="" placeholder="Genero"/>
                                <input  id = "subSinopsisProd" class="inpTeFormato" type="text" value="{{$p->sinopsis}}" placeholder="Sinopsis"/>-->

                                <input min="0" required name="cantidadactual" id="subCantidadProd" class="inpTeFormato" type="number" value="{{$p->cantidad}}" placeholder="Cantidad">
                                <select name="estado" id = "subSelectProd" class="inpTeFormato" value="{{$p->estado}}">
                                    <!-- Opciones de la lista -->
                                    <option value="Disponible">Disponible</option>
                                    <option value="No disponible">No disponible</option> <!-- Opción por defecto -->
                                </select>
                                <input name="id" value="{{$p->id}}" style="visibility: hidden"></p>

                                <input  id = "subProd"  class="formaReg" type="submit" value="Guardar cambios" placeholder="Guardar cambios"/>
                            </td>
                        </table>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        var form = document.getElementById("modPerf");
         form.onsubmit = function(e){

           let  nombre = document.getElementById("subNombreProd").value;
           let  cantidad = document.getElementById("subCantidadProd").value;
           let  estado = document.getElementById("subSelectProd").value;

           let errores ="";
           if(nombre == "" || cantidad == "" || estado == "" ||
              nombre == null || cantidad == null || estado == null){

              errores += "No debe haber espacios en blanco\n";
            }
            if(/[$%&|<>{}+´*]/.test(nombre) || /[$%&|<>{}+´*]/.test(cantidad) || /[$%&|<>{}+´*]/.test(estado)){

              errores += "No debe haber caracteres especiales\n";
            }
            if(cantidad >= 1000000){
               errores += "Se supero el limite de caracteres\n";
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
                    }else{
                        //alert("Se ha registrado correctamente");
                        swal({
                              title:"Exito",
                              text: "Se ha modificado correctamente",
                              icon: "success",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                    }

           /*if(errores != ""){
             alert(errores);
             e.preventDefault();
            }else{
                alert("Se ha modificado el producto correctamente");
            }*/
        }
       </script>
