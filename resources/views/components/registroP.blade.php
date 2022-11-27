<div id="regProducto">
    <form enctype="multipart/form-data" method="post" action="/registro_de_productos/insertar" name="formProducto">
        @csrf
        <div id="regProdImg">
            <img  id="regImg" src="storage/img/9qu67avBDKqlxs4RdGFaCWppiKYD8YqQMYTQkxXS.jpg">
            <input name="portada" id="subProdImg" type="file" accept="image/jpeg" placeholder="Seleccionar imagen">
        </div>
        <div id="regProdGeneral">
            <input  name="nombreProd" id = "subNombreProd" class="inpTeFormato" type="text" value="" placeholder="Nombre"/>
            <input  name="autorProd" id = "subAutorProd"  class="inpTeFormato" type="text" value="" placeholder="Autor"/>
            <input  name="provProd" id = "subAutorProd"  class="inpTeFormato" type="text" value="" placeholder="proveedor"/>

            <select name="generoProd" id = "subGeneroProd" class="inpTeFormato">
                <!-- Opciones de la lista -->
                <option value="Shonen">Shonen</option>
                <option value="Seinen" selected>Seinen</option> <!-- Opción por defecto -->
                <option value="Misterio">Misterio</option>
              </select>
           <!--- <input  id = "subGeneroProd" class="inpTeFormato" type="text" value="" placeholder="Genero"/> -->
           <input  id = "subSinopsisProd" class="inpTeFormato" type="text" value="" placeholder="Sinopsis"/>
        </div>

        <div id="registro">
            <span  id="subCantidadTitulo" class="formaReg">Cantidad</span>
            <input  name="cantidadProd" id = "subCantidadProd" class="formaReg" type="number" value="0" />
            <span id="subPrecioTitulo"class="formaReg">Precio</span>
            <input name="precioProd" id = "subPrecioProd" class="formaReg" type="number" value="0" />


            <select  name="categoriaProd" id = "subCategoriaProd" class="formaReg">
                <!-- Opciones de la lista -->
                <option value="Manga">Manga</option>
                <option value="Comic" selected>Comic</option> <!-- Opción por defecto -->
                <option value="Figura">Figura</option>
              </select>

            <input name="codigoProd" id = "subCodigoProd" class="formaReg" type="text" value="" placeholder="Codigo"/>
            <input  id = "subProd"  class="formaReg"type="submit" value="Agregar" placeholder="Agregar"/>
        </div>
    </form>





</div>
