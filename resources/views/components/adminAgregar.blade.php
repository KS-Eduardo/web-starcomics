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
        <div id="regProducto">
            <form enctype="multipart/form-data" class="logRegis" method="post" action="/admin/Agregar/insertar" name="formProducto" width="600px" height="800px" id="regPr">
                @csrf
                <div>
                    <p class="AdminText">Agregar producto</p>
                    <table style="width: 100%">
                        <td width="300px" id="tablaImagenProducto">
                            <div id="regProdImg">
                                <img  id="regImg" src="storage/img/9qu67avBDKqlxs4RdGFaCWppiKYD8YqQMYTQkxXS.jpg">
                                <input name="portada" id="subProdImg" type="file" accept="image/jpeg" placeholder="Seleccionar imagen" required>
                            </div>                        </td>
                        <td width="300px" id="tablaDatosProducto">
                            @php
                                $f=session('numf');
                            @endphp
                            <input readonly name="noFactProd" id = "subDatosFactProd2"  class="inpTeFormato" type="number" value="{{$f}}" placeholder="No. Factura" min="0" required/>
                            <!--<input  name="fechaProd" id = "subDatosFactProd1" class="inpTeFormato" type="date" value="" placeholder="Fecha"/>
                        <input  name="noFactProd" id = "subDatosFactProd2"  class="inpTeFormato" type="number" value="" placeholder="No. Factura"/>
                            <input  name="noPedProd" id = "subDatosFactProd2"  class="inpTeFormato" type="number" value="" placeholder="No. Pedido"/>
-->
                            <input  name="nombreProd" id = "subNombreProd" class="inpTeFormato" type="text" value="" placeholder="Nombre" required/>
                            <input  name="autorProd" id = "subAutorProd"  class="inpTeFormato" type="text" value="" placeholder="Autor" required />


                            <!-- <input  name="provProd" id = "subAutorProd"  class="inpTeFormato" type="text" value="" placeholder="Proveedor"/>-->

                            <select name="generoProd" id = "subSelectProd" class="inpTeFormato">
                                <!-- Opciones de la lista -->
                                <option value="Shonen">Shonen</option>
                                <option value="Seinen" selected>Seinen</option> <!-- Opción por defecto -->
                                <option value="Misterio">Misterio</option>
                            </select>
                            <!--- <input  id = "subGeneroProd" class="inpTeFormato" type="text" value="" placeholder="Genero"/> -->
                            <input name="sinopsis" id = "subSinopsisProd" class="inpTeFormato" type="text" value="" placeholder="Sinopsis" required/>

                            <input name="cantidad" id="subCantidadProd" class="inpTeFormato" type="number" value="" placeholder="Cantidad" min="0" required>
                            <input name="precioProd" id = "subPrecioProd" class="inpTeFormato" type="number" value="" placeholder="Precio" min="0" onkeyup="precioVenta()" required/>
                            <input readonly id = "precioventa" class="inpTeFormato" type="text" placeholder="Precio de venta" value=""/>

                            <select  name="categoriaProd" id = "subSelectProd2" class="inpTeFormato">
                                <!-- Opciones de la lista -->
                                <option value="Manga">Manga</option>
                                <option value="Comic" selected>Comic</option> <!-- Opción por defecto -->
                                <option value="Figura">Figura</option>
                            </select>

                            <input name="codigoProd" id = "subCodigoProd" class="inpTeFormato" type="text" value="" placeholder="Codigo" required/>
                            <input  id = "subProd"  class="formaReg" type="submit" value="Agregar" placeholder="Agregar"/>
                        </td>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function precioVenta() {
    var x = document.getElementById("subPrecioProd").value;
    var link= document.getElementById("precioventa");
     x=Math.round(x*1.46);
    // Math.round(x);
    link.value='$'+x;

    }

</script>
<script>
    var form = document.getElementById("regPr");
     form.onsubmit = function(e){

       let  imagen = document.getElementById("subProdImg").value;
       let factura = document.getElementById("subDatosFactProd2").value;
       //let pedido = document.getElementById("subDatosFactProd3").value;
       let nombreProd = document.getElementById("subNombreProd").value;
       let nombreAutorProd = document.getElementById("subAutorProd").value;
       //let nombreProvProd = document.getElementById("subProvProd").value;
       let genero = document.getElementById("subSelectProd").value;
       let sinopsis = document.getElementById("subSinopsisProd").value;
       let cantidad = document.getElementById("subCantidadProd").value;
       let precio = document.getElementById("subPrecioProd").value;
       let categoria = document.getElementById("subSelectProd2").value;
       let codigo = document.getElementById("subCodigoProd").value;


       let errores ="";


       if(imagen == null){
         errores += "No se ha seleccionado imagen\n";

       }
       if(factura == "" ){
         errores += "Debe ingresar la factura\n";

       }
       /*if(pedido == "" ){
         errores += "Debe ingresar el Pedido. ";

       }*/
       if(/[$%&|<>{}+´*]/.test(nombreProd) || nombreProd == ""){
         errores += "El producto no debe tener caracteres especiales ni estar vacio\n";

       }
       if(/[$%&|<>{}+´*]/.test(nombreAutorProd) || nombreAutorProd == ""){
        errores += "El autor no debe tener caracteres especiales ni estar vacio\n";

       }
       /*if(/[$%&|<>{}+´*]/.test(nombreProvProd) || nombreProvProd == ""){
         errores += "El proveedor no debe tener caracteres especiales ni estar vacio. ";

       }*/
       if(/[$%&|<>{}+´*]/.test(genero) || genero == ""){
         errores += "El genero no debe tener caracteres especiales ni estas vacio\n";

       }
       if(/[$%&|<>{}+´*]/.test(sinopsis) || sinopsis == "" || sinopsis.length > 500){
         errores += "La sinopsis no debe tener caracteres especiales, estar vacia o tener mas de 500 caracteres\n";

       }
       if(cantidad == "" ){
         errores += "Debe Seleccionar la cantidad\n";

       }
       if(precio == "" ){
         errores += "Debe Seleccionar el precio\n";

       }
       if(/[$%&|<>{}+´*]/.test(categoria) || categoria == ""){
         errores += "La categoria no debe tener caracteres especiales o estar vacia\n";

       }
       if(codigo == "" ){
         errores += "Debe ingresar el codigo\n";
        // alert("Vienes del futuro e?");
       }
       if(nombreProd.length > 100 || nombreAutorProd.length > 100 || categoria.length > 100 ||genero.length > 100 || codigo >= 1000000 || precio >= 1000000  || cantidad >= 1000000){
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
                              text: "Se ha registrado el producto correctamente",
                              icon: "success",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                    }


       /*if(errores != ""){
         alert(errores);
         e.preventDefault();
       }else{
        alert("Se ha registrado el producto correctamente");
       }*/

     }
   </script>
