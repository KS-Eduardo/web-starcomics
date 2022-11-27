    <div class="registroUsuario">
        <div class="textoLogRegis"><h1 >Registrarse</h1></div>
        <form class="logRegis" method="post" action="/alta_de_usuarios/Registrarse" name="formUsuarios" id="formRegUser">
            @csrf

            <label for="correo" class="formLabel">Correo electronico</label><br>
            <input name ="correo" class = "Registro" id = "correoReg" type="text" value="" placeholder="example@helloworld.com" required/>

            <label for="contraseña" class="formLabel">Contraseña</label><br>
            <input name ="contraseña" class = "Registro" id = "contraseñaReg" type="password" value="" placeholder="************************" required/>

            <label for="contraseña2" class="formLabel">Confirmar Contraseña</label><br>
            <input name ="contraseña2" class = "Registro" id = "contraseñaReg2" type="password" value="" placeholder="************************" required/>

            <label for="edad" class="formLabel">Fecha de nacimiento</label><br>
            <input name ="edad" class = "Registro" id = "edadReg" type="date" value="" placeholder="Edad" style="padding:10px;" required/>

            <label for="direccion" class="formLabel">Dirección</label><br>
            <input name ="calles"class = "Registro" id = "direccionReg" type="text" value="" placeholder="Calles" style="padding:10px;" required/>
            <input name ="colonia"class = "Registro" id = "direccionReg2" type="text" value="" placeholder="Colonia" required/>
            <input name ="estado"class = "Registro" id = "direccionReg3" type="text" value="" placeholder="Estado" required/>
            <input name ="cp"class = "Registro" id = "direccionReg4" type="text" value="" placeholder="Codigo postal" required/>
            <input name ="telefono"class = "Registro" id = "direccionReg5" type="text" value="" placeholder="Telefono" required/>
            <input name ="sparticular"class = "Registro" id = "direccionReg6" type="text" value="" placeholder="Señas particulares" required/>
            <input id = "Registrarse" type="submit" value="Registrarse" placeholder="Registrarse"/>

            <div class="disclamer">
                <p>¿Ya tienes cuenta?</p>
            </div>
            <a href="{{URL::to('/login')}}"> <input class = "registrarseBtn" id = "registrarseBtn" type="button" value="Iniciar Sesión" placeholder="registrarse"/></a>
        </form>
    </div>

    <script >

        var form = document.getElementById("formRegUser");
        form.onsubmit = function(e){

            let correo = document.getElementById("correoReg").value;
            let contraseñaA = document.getElementById("contraseñaReg").value;
            let contraseñaB = document.getElementById("contraseñaReg2").value;
           // let edad = document.getElementById("edad").value;
            let direccion = document.getElementById("direccionReg").value;
            let direccion2 = document.getElementById("direccionReg2").value;
            let direccion3 = document.getElementById("direccionReg3").value;
            let direccion4 = document.getElementById("direccionReg4").value;
            let direccion5 = document.getElementById("direccionReg5").value;
            let direccion6 = document.getElementById("direccionReg6").value;


            let errores ="";

           /*  if(correo == "" || telefono == "" || calles == "" || colonia == "" || estado == "" || codigoP == "" || señasP == "" || contraseñaA == "" || contraseñaB =="" || particular == ""
                       correo == null || telefono == null || calles == null || colonia == null || estado == null || codigoP == null || señasP == null contraseñaA == null || contraseñaB == null || particular ==null){
                       errores += "No debe haber espacios en blanco\n";
                    }*/
                    if (!/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(correo)){
                        errores += "El correo no tiene el formato adecuado\n";
                    }
                    if(!/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contraseñaA)){
                        errores += "La contraseña no tiene el formato adecuado\n";
                    }
                    if(!(contraseñaA == contraseñaB)){
                        errores += "Las contraseñas no son iguales\n";
                    }
                   /* if (edad.toString() ==null || edad.toString() == "") {
                        errores+= "Debe seleccionar una fecha\n";
                    }*/
                    if (/[$%&|_<>#{}+´?¿*]/.test(direccion) || /[$%&|_<>#{}+´?¿*]/.test(direccion2) || /[$%&|_<>#{}+´?¿*]/.test(direccion3) || /[$%&|_<>#{}+´?¿*]/.test(direccion4)
                        || /[$%&|_<>#{}+´?¿*]/.test(direccion5) || /[$%&|_<>#{}+´?¿*]/.test(direccion6)) {
                        errores += "No debe haber caracteres especiales\n";
                    }
                    if(!/[0-9]{5,5}/.test(direccion5) || direccion4>99999){

                        errores += "El codigo postal debe tener 5 digitos\n";
                    }
                    if(correo.length > 100 || contraseñaA.length > 255 || (direccion+direccion2+direccion3+direccion4+direccion5+direccion6+"aaaaaa").length > 1000){
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
                              text: "Se ha registrado correctamente",
                              icon: "success",
                              button: "Ok",
                              closeOnClickOutside: false,
                            });
                    }



        }
    </script>

