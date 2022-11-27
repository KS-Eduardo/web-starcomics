        <div id="prod">
            <!-- aqui va la imagen-->
            <div  class="prodImg">
                <img class="pI" src="/storage/{{$producto->portada}}" style="width: 520; height: 520px; object-fit: fill;">
            </div>

            <div class="prodInf">

                <div class="guiaProd">
                    <h1 class="tituloInfo">{{$producto->nombre}}</h1>
                </div>

                <div class="guiaProd">
                    <h2>Sinopsis</h2>
                    <span class="sinopsis">{{$producto->sinopsis}}</span>
                </div>

                <div class="guiaProd">
                    <h2 class="preInfo"> Precio: <span class="resul">${{$producto->precio}}.00</span><h2>
                </div>

                <div class="btnForms">
                <!-- derecha de la imagen-->
                    @if (session()->has('user'))
                    <p id="numeroUsuario">{{session('user')->id}}</p>

                    <div class="btnCarAdd"><form class="" method="post" action="/productos/detalle/insertar/{{$producto->id}}">
                        @csrf
                        <input id="agregarAlCarritoBtn" type="submit" value="Agregar al carrito" placeholder="Agregar al carrito"/>
                    </form></div>

                    <div class="btnWishAdd"><form class=""method="post" action="/productos/detalle/insertarD/{{$producto->id}}">
                        @csrf
                        <input id="agregarAlCarritoBtn" type="submit" value="Agregar lista de deseos" placeholder="Agregar al carrito"/>
                    </form></div>
                    @else

                    @endif
                </div>
                <div class="alingInf">
                    <span class="autorInfo">Autor: <span class="resul">{{$producto->autor}}</span></span>
                    <span class="generoInfo">Genero: <span class="resul">{{$producto->genero}}</span></span>
                </div>
            </div>
       </div>
       <div class="productosP">

        <table><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Recomendados</p>
            @php
                $salto=0;
            @endphp
        @foreach ($rec as $producto)
        @if ($salto==0)
        <tr>
        @endif
        <td  class="ProdMarco" style="width: 20vw; background-color: rgb(17, 67, 88);border-radius: 15px; color: white;">
            <table>
                <tr>
                    <td>
                        <a href="/productos/detalle/{{$producto->id}}">
                        <img src="/storage/{{$producto->portada}}" style="width: 150px; height: 150px; border-radius: 15px;"></a>
                    </td>
                    <td>
                        <div style="text-overflow: ellipsis; height: 100px;">
                            <p class="AdminText" style="font-size: 20px;">{{$producto->nombre}}</p>
                        </div>

                        <p class="AdminText" style="font-size: 16px;">{{$producto->genero}}</p>
                        <span class="AdminText" style="font-size: 24px;">${{$producto->precio}}</span>
                    </td>
                </tr>
            </table>
        </td>
        @if ($salto==4)
        @php
            $salto=-1;
        @endphp
        <tr>
        @endif
        @php
                $salto++;
            @endphp
        @endforeach
        </table>
        </div>

