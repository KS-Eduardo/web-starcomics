<div class="perfilUsuario">
    <div class="textoLogRegis"><h1>Mi Perfil</h1></div>
    <form class="perfil" method="post" action="/perfilUsuario/Modificar" name="formPerfil" id="modPerf">
        @csrf
        <h2 class="txtInf">Informacion del usuario</h2>
        @php
                $Correo=session('user')->correo;
                $direccion = session('user')->direccion;
                $d = explode("_", $direccion);
        @endphp

        <div class="userFlexPadre">
            <div class="flexSon">
                <label for="correo" class="infoLabel">Correo electronico:</label>
                <input required id="correoCPerf" name ="correo" class="tam" type="text" value="{{$Correo}}" placeholder="example@helloworld.com" required/><br>
            </div>

            <div class="flexSon">
                <a href="http://starcomics.test/olvideContrase%C3%B1a/{{$Correo}}"><label for="" class="infoLabel">Cambiar contraseña</label></a><br>
            </div>

            <div class="flexSon">
                <label for="telofono" class="infoLabel">Telefono:</label>
                <input required id="telefonoCPerf" name ="telefono" class="tam" type="tel" value="{{$d[4]}}" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required/><br>
            </div>

            <div class="flexSon">
                <label for="calle" class="infoLabel">Calles:</label>
                <input required id="callesCPerf" name ="calle" class="tam" type="text" value="{{$d[0]}}" placeholder="Cuahuctémoc" required/><br>
            </div>

            <div class="flexSon">
                <label for="colonia" class="infoLabel">Colonia:</label>
                <input required name ="colonia" class="tam" id="direccion" type="text" value="{{$d[1]}}" placeholder="Bellavista" required/> <br>
            </div style="display: flex">

            <div class="flexSon">
                <label for="colonia" class="infoLabel">Estado:</label>
                <input required name ="estado" class="tam" id="direccion2" type="text" value="{{$d[2]}}" placeholder="Bellavista" required/> <br>
            </div>

            <div class="flexSon">
                <label for="cp" class="infoLabel">Codigo Postal:</label>
                <input required name ="cp" class="tam" id="direccion3"  type="number" value="{{$d[3]}}" placeholder="27049" required/><br>
            </div>

            <div class="flexSon">
                <label for="señas" class="infoLabel">Señas Particulares:</label>
                <input required name ="señas" id="señasCPerf" class="tam" type="text" value="{{$d[5]}}" placeholder="casa color naranja chillon" required/><br>
            </div>

            <div class="buttonsUser">
                <input type="submit" value="Editar Info." placeholder="">
                <a href="{{URL::to('/historial')}}"> <input type="button" value="Ver Historial" placeholder=""/></a>
            </div>

        </div>

    </form>
</div>
<script>
    var form = document.getElementById("modPerf");
     form.onsubmit = function(e){

       let  correo = document.getElementById("correoCPerf").value;
       let  telefono = document.getElementById("telefonoCPerf").value;
       let  calles = document.getElementById("callesCPerf").value;
       let  colonia = document.getElementById("direccion").value;
       let  estado = document.getElementById("direccion2").value;
       let  codigoP = document.getElementById("direccion3").value;
       let  señasP = document.getElementById("señasCPerf").value;


       let errores ="";
      /* if(correo == "" || telefono == "" || calles == "" || colonia == "" || estado == "" || codigoP == "" || señasP == "" ||
          correo == null || telefono == null || calles == null || colonia == null || estado == null || codigoP == null || señasP == null){

          errores += "No debe haber espacios en blanco\n";
        }*/
        if(/[$%&|<>{}+´*]/.test(correo) || /[$%&|_<>{}+´*]/.test(telefono) || /[$%&|_<>{}+´*]/.test(calles) || /[$%&|_<>{}+´*]/.test(colonia)
            || /[$%&|_<>{}+´*]/.test(estado) || /[$%&|_<>{}+´*]/.test(codigoP) || /[$%&|_<>{}+´*]/.test(señasP)){

          errores += "No debe haber caracteres especiales\n";
        }
        if(!/[0-9]{5,5}/.test(codigoP) || codigoP>99999){

          errores += "El codigo postal debe tener 5 digitos\n";
        }
        if (!/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(correo)){
                errores += "El correo no tiene el formato adecuado\n";

        }
        if(correo.length > 100 || (telefono+calles+colonia+estado+codigoP+señasP+"aaaaaa").length > 1000){
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
                              text: "Se han actualizado sus datos correctamente",
                              icon: "success",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                    }

      /* if(errores != ""){
         alert(errores);
         e.preventDefault();
        }else{
            alert("Ha actualizado sus datos correctamente");
        }*/
    }
   </script>
