
        <div class="login">
            <div class="textoLogRegis"><h1 >Recuperar contraseña</h1></div>
            @php
                 $token = explode("-", $correo);
            @endphp
            <form class="logRegis" method="post" action="/cambiarContra/{{$token[1]}}" name="formLogin" id="olvide">

                @csrf
                <label for="contraseña" class="formLabel">Nueva contraseña</label><br>
                <input name= "contraseñaLog" class = "contraseña" id = "contraseña" type="password" value="" placeholder="**************"/><br>
                <label for="contraseña" class="formLabel">Repetir contraseña</label><br>
                <input name= "contraseñaLogR" class = "contraseña" id = "contraseña2" type="password" value="" placeholder="**************"/><br>
                <input class = "confirmarBtn" id = "confirmarBtn" type="submit" value="Confirmar" placeholder="confirmar"/><br>
                <input name="correo" value="{{$token[0]}}" type="text" style="display:none">

                <a href="{{URL::to('/login')}}"> <input class = "volverBtn" id = "volverBtn" type="button" value="Volver" placeholder="volver"/></a>
            </form>
            <script >

                var form = document.getElementById("olvide");
                form.onsubmit = function(e){

                    let contraseñaA = document.getElementById("contraseña").value;
                    let contraseñaB = document.getElementById("contraseña2").value;

                    let errores ="";


                            if(!/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contraseñaA)){
                                errores += "La contraseña no tiene el formato adecuado\n";
                            }
                            if(!(contraseñaA == contraseñaB)){
                                errores += "Las contraseñas no son iguales\n";
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
        </div>
