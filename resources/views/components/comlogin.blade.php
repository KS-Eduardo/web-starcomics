
        <div class="login">
            <div class="textoLogRegis"><h1 >Iniciar Sesión</h1></div>
            <form class="logRegis" method="post" action="/login_de_usuarios/Login" name="formLogin" id="log">
                @csrf
                <label for="correo" class="formLabel">Correo electronico</label><br>
                <input required name="correoLog" class = "correo" id = "correo" type="text" value="" placeholder="example@helloworld.com" onkeyup="link()"/><br>
                <label for="contraseña" class="formLabel">Contraseña</label><br>
                <input required name= "contraseñaLog" class = "contraseña" id = "contraseña" type="password" value="" placeholder="**************"/><br>
                <input class = "confirmarBtn" id = "confirmarBtn" type="submit" value="Confirmar" placeholder="confirmar"/><br>

                <a href="{{URL::to('/registro')}}"> <input class = "registrarseBtn" id = "registrarseBtn" type="button" value="Registrarse" placeholder="registrarse"/></a>
            </form>
            <script>
                function link() {
                var x = document.getElementById("correo").value;
                var link= document.getElementById("contra");
                link.href="/login_de_usuarios/Login/olvidar/"+x;

                }

            </script>
            <div class="disclamer"><p >Al continuar, usted esta aceptando los <a >Terminos de uso</a> y el <a >Aviso de privacidad</a></p></div>



            <div class="disclamer"><p >¿Olvidaste tu contraseña? <a id="contra" href="">Click Aqui</a></p></div>

        </div>

        <script>

            var form = document.getElementById("log");
            form.onsubmit = function(e){

                let correo = document.getElementById("correo").value;
                let contraseña = document.getElementById("contraseña").value;

                let errores ="";

                if(correo == null || contraseña == null || correo == "" || contraseña == ""){
                    errores += "No debe haber espacios en blanco\n";

                }

                if (/[$%&|_<>#{}+´?¿*]/.test(correo) || /[$%&|_<>#{}+´?¿*]/.test(contraseña)) {
                    errores += "No debe haber caracteres especiales\n";

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
                  //alert("La dirección de email " + correoValor + " es correcta.");
                //e.preventDefault();



            }
        </script>
