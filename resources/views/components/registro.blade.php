    <div id="cuerpo">
        <ul class="menu">
            <li class="menuItem">Mangas</li>
            <li class="menuItem">Comics</li>
            <li class="menuItem">Figuras</li>
            <li class="menuItem">Destacados</li>
            <li class="menuItem">Ofertas</li>
        </ul>
        <div id="registroUsuario">

            <form method="post" action="/alta_de_usuarios/Registrarse" name="formUsuarios">
                @csrf
                <input name ="correo" class = "Registro" id = "correoReg" type="text" value="" placeholder="Correo"/>
                <input name ="contraseña" class = "Registro" id = "contraseñaReg" type="password" value="" placeholder="Contraseña"/>
                <input name ="edad" class = "Registro" id = "edadReg" type="date" value="" placeholder="Edad"/>
                <input name ="direccion"class = "Registro" id = "direccionReg" type="text" value="" placeholder="Direccion"/>

                <input id = "Registrarse" type="submit" value="Registrarse" placeholder="Registrarse"/>
            </form>


        </div>


    </div>
