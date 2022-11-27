<div id="venta">

    <div class="flex1">

        <div id="direc">
            @php
                $Correo=session('user')->correo;
                $direccion = session('user')->direccion;
                $d = explode("_", $direccion);
                $telefono=$d[4];
            @endphp

            <span class="ventaTitle">Direccion</span>
            <form class="formVenta" method="post" action="/confirmarVenta/venta/confirmar" id="subVenta">
                @csrf


                <div id="acomodar">
                    <div class="uno">
                        <label for="calle">Calles:</label>
                    </div>
                    <div class="dos">
                        <input required style="width: 100%" id="confCalle" name="calle" type="text" value="{{$d[0]}}" placeholder="Cuahuctémoc" required/>
                    </div>
                </div>

                <div id="acomodar">
                    <div class="uno">
                        <label for="colonia">Colonia:</label>
                    </div>
                    <div class="dos">
                        <input required style="width: 100%" id="confColonia" name="colonia" type="text" value="{{$d[1]}}" placeholder="Bellavista" required/>
                    </div>

                </div>

                <div id="acomodar">
                    <div class="uno">
                        <label for="colonia">Estado:</label>
                    </div>
                    <div class="dos">
                        <input required style="width: 100%" id="confEstado" name="estado" type="text" value="{{$d[2]}}" placeholder="Bellavista" required/>
                    </div>

                </div>

                <div id="acomodar">
                    <div class="uno">
                        <label for="cp">Codigo Postal:</label>
                    </div>
                    <div class="dos">
                        <input required style="width: 100%" id="confCodigoP" name="cp" type="text" value="{{$d[3]}}" placeholder="27049" required/>
                    </div>
                </div>
                <div id="acomodar">
                    <div class="uno">
                        <label required for="cp">Telefono:</label>
                    </div>
                    <div class="dos">
                        <input required style="width: 100%" id="confTel" name="telefono" type="text" value="{{$d[4]}}" placeholder="27049" required/>
                    </div>
                </div>

                <div id="acomodar">
                    <div class="uno">
                        <label for="señas">Señas Particulares:</label>
                    </div>
                    <div class="dos">
                        <input required style="width: 100%" id="confSeñasP"  name="señas" type="text" value="{{$d[5]}}" placeholder="casa color naranja chillon" required/>
                    </div>
                </div>

                <div >
                    <label>"Modificar los campos cambiara la direcci&oacute;n de su perfil"</label>
                </div>

        </div>

            <div class="flex2">
                <div id="metPago">
                    <span class="ventaTitle">Metodos de pago</span>
                    <br>

                    <select aria-label="revelde">
                        <!-- Opciones de la lista -->
                        <option value="1">Visa</option>
                        <option value="2" selected>Master Card</option> <!-- Opción por defecto -->
                        <option value="3">SPEI</option>
                        <option value="4">OXXO</option>
                    </select>
                </div>

                <hr style="width: 100%; border: 1px solid">

                <div id="confirmarVenta" style="">

                        <span>Total ${{$total}}</span>
                        <br>
                        <br>
                        <div>

                            <a href="/carrito"><input  id = "cancelarVenBtn"   type="button" value="Cancelar" placeholder="Cancelar"/></a>
                            <input id='D'name="total" value="{{$total}}" style="display:none;">
                            <input  id = "confirmarVenBtn" type="submit" value="Confirmar" placeholder="Confirmar"/>
                        </div>
                    </form>
                </div>

            </div>

    </div>
</div>
<script>
    var form = document.getElementById("subVenta");
     form.onsubmit= function(e){
       let calles = document.getElementById("confCalle").value;
       let colonia = document.getElementById("confColonia").value;
       let estado = document.getElementById("confEstado").value;
       let codigoP = document.getElementById("confCodigoP").value;
       let telefono = document.getElementById("confTel").value;
       let señasP = document.getElementById("confSeñasP").value;



       let errores ="";
          if( calles == "" ||  colonia == "" || estado == "" ||  codigoP == "" || telefono == "" ||  señasP == "" ||
             calles == null || colonia == null || estado == null || codigoP == null || telefono == null || señasP == null){

               errores += "No debe haber espacios en blanco\n";
            }
            if(/[$%&|_<>{}+´*]/.test(telefono) || /[$%&|_<>{}+´*]/.test(calles) || /[$%&|_<>{}+´*]/.test(colonia)
               || /[$%&|_<>{}+´*]/.test(estado) || /[$%&|_<>{}+´*]/.test(codigoP) || /[$%&|_<>{}+´*]/.test(señasP)){

               errores += "No debe haber caracteres especiales\n";
            }
            if(!/[0-9]{5,5}/.test(codigoP) || codigoP>99999){

              errores += "El codigo postal debe tener 5 digitos\n";
            }
            if((telefono+calles+colonia+estado+codigoP+señasP+"aaaaaa").length > 1000){
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
                              text: "La venta se ha realizado correctamente",
                              icon: "success",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                    }

          /*if(errores != ""){
            alert(errores);
            e.preventDefault();
           }else{
            alert("La venta se ha realizado correctamente");
           }*/
     }
</script>
