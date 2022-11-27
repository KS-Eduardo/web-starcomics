<!-- parte izquierda-->
<div id="adminHome">
    <div class="IZQ" method="post">
        <form action="" class="menuIzquierda">
            <a href="{{URL::to('/admin/Agregar')}}"><input type="button" value="Agregar" style="background-color: rgb(272, 170, 31); color: black;"></a><br>
            <a href="{{URL::to('/admin/Pedidos')}}"><input type="button" value="Pedidos"></a><br>
            <a href="{{URL::to('/admin/Usuarios')}}"><input type="button" value="Usuarios"></a><br>
            <a href="{{URL::to('/admin/Existencias')}}"><input type="button" value="Existencias"></a><br>
            <a href="{{URL::to('/admin/Movimientos')}}"><input type="button" value="Movimientos"></a><br>
        </form>
    </div>

    <!-- parte derecha-->
    <div id="DER">
        <p class="AdminText">Ingresar Facturas</p>
        <table>
            <tr>
                <div class="pedidosRow" style="width: 800px; height: 100px;">
                    <!--Form para capturar datos de factura-->
                    <form enctype="multipart/form-data" method="post" action="/admin/Agregar/factura" name="formProducto" width="600px" height="800px" id="agreFactura">
                        @csrf
                        <div class="flexFact1">
                            <input  name="noFactProd" id = "datosFact"  class="" type="number" value="" placeholder="No. Factura" min="0" max="1000000" required/>
                            <input  name="fechaProd" id = "datosFact2" class="" type="date" value="" placeholder="Fecha" required/>
                            <input  name="total" id = "datosFact3"  class="" type="number" value="" placeholder="Total" min="0" required/>
                            <input  name="provProd" id = "datosFact4"  class="" type="text" value="" placeholder="Proveedor" required/>
                        </div>

                        <div class="flexFact">
                            <input name="buscarusuario" id="subProdFact"  class="" type="submit" value="Añadir factura" placeholder="Eliminar usuario" style="left: 25%; top: 10px;"/>
                        </div>
                    </form>
                </div>

                <div class="pedidosRow" style="width: 800px; height: 200px;">
                    <form enctype="multipart/form-data" method="post" action="/admin/Agregar/factura/buscar" name="formProducto" width="600px" height="800px" id="buscFact">
                        @csrf
                        <input name="fechaProd" id = "subDatosFactProd1" class="inpTeFormato" type="date" value="" placeholder="Fecha" style="top: 10px; width:780px; left: 10px;" required/>
                        <div class="flexFact">
                            <input name="buscarusuario" id="subProdFact"  class="" type="submit" value="Buscar factura por fecha" placeholder="" style="left: 25%; top: 10px;"/>
                        </div>
                    </form>
                    <!--Form que te muestra el seleccionado-->
                    <form enctype="multipart/form-data" method="post" action="/admin/Agregar/factura/agregar" width="600px" height="800px">
                        @csrf
                        <input  name="nombreusuario" id = "subNombreProd" class="inpTeFormato" type="text" value="" placeholder="Factura Seleccionada" style="top: 10px; width:780px; left: 5px;" readonly required/>

                    <!--Form para seleccionar la fecha-->
                    <!--BOTONES PARA CAPTURAR LOS PRODUCTOS Y VER LA FACTURA-->
                    <div class="flexFact">
                        <input name="buscarusuario" id="subProdFact"  class="" type="submit" value="Capturar productos" placeholder="" style="left: 25%; top: 10px;"/>
                    </form>
                    <a id="link" > <input name="buscarusuario" id="subProdFact"  class="" type="button" value="Ver factura" placeholder="" style="left: 25%; top: 10px;"/></a>
                    </div>


                </div>

            </tr>
            <tr>
                <script>
                    function pulsar(factura) {

                      let barra = document.getElementById("subNombreProd");
                      let link = document.getElementById("link");
                      barra.value= factura;
                      if(barra.value != null || barra.value!= ""){
                        link.href="/admin/Factura/ticket/"+factura;
                      }

                    }
                </script>

                <div class="pedidosRow" style="width: 800px; height: 460px; width: 800px; overflow: auto;">
                    <div style="height: 50px; width: 800px; display: table;">
                        <p class="inpTeFormato" style="left: 5px; float: left; position: relative;">No. Factura</p>
                        <p class="inpTeFormato" style="left: 5px; float: left; position: relative;">Fecha</p>
                        <p class="inpTeFormato" style="left: 90px; float: left; position: relative;">Total</p>
                        <p class="inpTeFormato" style="left: 200px; float: left; position: relative;">Proveedor</p>
                        <p class="inpTeFormato" style="left: 240px; float: left; position: relative;">Usuario</p>
                    </div>
                    @foreach ($facturas as $f)
                    <!-- aaa este es el renglon -->
                        <div style="height: 30px; width: 800px; top: 10px; position: relative;">
                            <div class="usuarioDiv" style="left: 5px;  width: 15%; float: left;">
                                <p class="inpTeFormato" onclick="pulsar('{{$f->id}}')">{{$f->id}}</p>
                            </div>
                            <div class="usuarioDiv" style="left: 10px; width: 20%; margin: 0; float: left;">
                                <p class="inpTeFormato">{{$f->fecha}}</p>
                            </div>
                            <div class="usuarioDiv" style="left: 15px; width: 20%; margin: 0; float: left;">
                                <p class="inpTeFormato">${{$f->total}}</p>
                            </div>
                            <div class="usuarioDiv" style="left: 20px; width: 20%; margin: 0; float: left;">
                                <p class="inpTeFormato">{{$f->proveedor}}</p>
                            </div>
                            <div class="usuarioDiv" style="left: 25px; width: 20%; margin: 0; float: left; ">
                                <p style="overflow:auto;" class="inpTeFormato">{{$f->correo}}</p>
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
<script>
    var form = document.getElementById("agreFactura");
     form.onsubmit= function(e){
       let numeroFact = document.getElementById("datosFact").value;
       let fechaFact = document.getElementById("datosFact2").value;
       let totalFact = document.getElementById("datosFact3").value;
       let provFact = document.getElementById("datosFact4").value;



       let errores ="";

       if(numeroFact == "" || fechaFact== "" || totalFact == "" || provFact == "" ||
          numeroFact == null || fechaFact == null || totalFact == null || provFact == null){
           errores += "No debe haber espacios en blanco";
       }
       if(/[$%&|<>{}+´*]/.test(provFact)){
        errores += "No debe haber caracteres especiales\n";
       }

       if(provFact.length > 100 || totalFact >= 1000000 ){
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
                              text: "Se ha agregado la factura correctamente",
                              icon: "success",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                    }

      /* if(errores != ""){
          alert(errores);
          e.preventDefault();
       }else{
        alert("Se ha agregado la factura correctamente");
       }*/
     }
</script>


<script>
    var form = document.getElementById("buscFact");
     form.onsubmit= function(e){
       let fechaBuscarFact = document.getElementById("subDatosFactProd1").value;

       let errores ="";

       if(fechaBuscarFact == "" || fechaBuscarFact == null ){
           errores += "Debe seleccionar una fecha";
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
     }
</script>
