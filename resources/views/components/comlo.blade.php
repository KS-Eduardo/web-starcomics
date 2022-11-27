
        <div id="login">

            <form method="post" action="/login_de_usuarios/Login" name="formLogin">

                @csrf
                <input name="correoLog" class = "correo" id = "correo" type="text" value="" placeholder="Correo"/>
                <input name= "contraseñaLog" class = "contraseña" id = "contraseña" type="password" value="" placeholder="Contraseña"/>
                <input class = "confirmarBtn" id = "confirmarBtn" type="submit" value="Confirmar" placeholder="confirmar"/>

                <a href="{{URL::to('/registro')}}"> <input class = "registrarseBtn" id = "registrarseBtn" type="button" value="Registrarse" placeholder="registrarse"/></a>

            </form>


        </div>
