<main id="info">

    <div id="cuerpo">
        <div class="buscarDiv">
            <form class="btnBuscarA" method="post" action="/catalogo/buscar">
                @csrf
                <input  name ="Buscar" class="BuscarA" id = "Buscar" type="text" value="" placeholder="Buscar producto ..."/>
                <button type="submit"><i class="fa fa-search"></i></button>

            </form>

        </div>

        <ul class="menu" style="margin: 0;">
            <a href="/catalogo/Manga"> <li class="menuItem">Mangas</li></a>
            <a href="/catalogo/Comic"><li class="menuItem">Comics</li></a>
            <a href="/catalogo/Figura"><li class="menuItem">Figuras</li></a>
            <a href="/"><li class="menuItem">Destacados</li></a>
            <a href="{{URL::to('/deseos')}}"><li class="menuItem">Deseados</li></a>
        </ul>

<!-- COSAS TUMBADAS DE W3SCHOOLS -->
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="/imagenes2/EdensZero.jpg" style="width:100%">
        <div class="text">EdensZero</div>
        </div>

        <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="/imagenes2/OnePiece2.jpg" style="width:100%">
        <div class="text">One Piece</div>
        </div>

        <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="/imagenes2/RosarioVamp.jpg" style="width:100%">
        <div class="text">Rosario + Vampire</div>
        </div>

    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>
<!-- FIN DE COSAS TUMBADAS DE W3SCHOOLS -->

<!--  para mostrar una tabla   -->
<div class="productosP">
    <table>
        <p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Los mas vendidos</p>
        @php
            $salto=0;
        @endphp
    @foreach ($productos as $producto)
    @if ($salto==0)
    <tr>
    @endif
    @if ($producto->estado==0 || $producto->cantidad==0)

    @else


    <td  class="ProdMarco" style="width: 20vw; background-color: rgb(17, 67, 88); border-radius: 15px; color: white;">
        <table>
            <tr>
                <td>
                    <a href="/productos/detalle/{{$producto->id}}">
                    <img src="/storage/{{$producto->portada}}" style="width: 150px; height: 150px; border-radius: 15px;"></a>
                </td>
                <td>
                    <div style="text-overflow: ellipsis; height: 100px; overflow: hidden;">
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
    @endif
    @endforeach
    </table>
</div>

<!--  para mostrar una tabla   -->


<!--  para mostrar una tabla   -->
<div class="productosP">
    <table><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Ultimos agregados</p>
        @php
            $salto=0;
        @endphp
    @foreach ($ultimos as $producto)
    @if ($salto==0)
    <tr>
    @endif
    @if ($producto->estado==0 || $producto->cantidad==0)

    @else
    <td  class="ProdMarco" style="width: 20vw; background-color: rgb(17, 67, 88); border-radius: 15px; color: white;">
        <table>
            <tr>
                <td>
                    <a href="/productos/detalle/{{$producto->id}}">
                    <img src="/storage/{{$producto->portada}}" style="width: 150px; height: 150px; border-radius: 15px;"></a>
                </td>
                <td>
                    <div style="text-overflow: ellipsis; height: 100px; overflow: hidden;">
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
        @endif
    @endforeach
    </table>
</div>
<!--  para mostrar una tabla   -->



<!--  para mostrar una tabla   -->
<div class="productosP">
    <table><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Mangas</p>
        @php
            $salto=0;
        @endphp
    @foreach ($mangas as $producto)
    @if ($salto==0)
    <tr>
    @endif
    @if ($producto->estado==0 || $producto->cantidad==0)

    @else
    <td  class="ProdMarco" style="width: 20vw; background-color: rgb(17, 67, 88); border-radius: 15px; color: white;">
        <table>
            <tr>
                <td>
                    <a href="/productos/detalle/{{$producto->id}}">
                    <img src="/storage/{{$producto->portada}}" style="width: 150px; height: 150px; border-radius: 15px;"></a>
                </td>
                <td>
                    <div style="text-overflow: ellipsis; height: 100px; overflow: hidden;">
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
        @endif
    @endforeach
    </table>
</div>
<!--  para mostrar una tabla   -->


<!--  para mostrar una tabla   -->
<div class="productosP">
    <table><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Comics</p>
        @php
            $salto=0;
        @endphp
    @foreach ($comics as $producto)
    @if ($salto==0)
    <tr>
    @endif
    @if ($producto->estado==0 || $producto->cantidad==0)

    @else
    <td  class="ProdMarco" style="width: 20vw; background-color: rgb(17, 67, 88); border-radius: 15px; color: white;">
        <table>
            <tr>
                <td>
                    <a href="/productos/detalle/{{$producto->id}}">
                    <img src="/storage/{{$producto->portada}}" style="width: 150px; height: 150px; border-radius: 15px;"></a>
                </td>
                <td>
                    <div style="text-overflow: ellipsis; height: 100px; overflow: hidden;">
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
        @endif
    @endforeach
    </table>
</div>
<!--  para mostrar una tabla   -->

<!--  para mostrar una tabla   -->
<div class="productosP">
    <table><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Figuras</p>
        @php
            $salto=0;
        @endphp
    @foreach ($figuras as $producto)
    @if ($salto==0)
    <tr>
    @endif
    @if ($producto->estado==0 || $producto->cantidad==0)

    @else
    <td  class="ProdMarco" style="width: 20vw; background-color: rgb(17, 67, 88);border-radius: 15px; color: white;">
        <table>
            <tr>
                <td>
                    <a href="/productos/detalle/{{$producto->id}}">
                    <img src="/storage/{{$producto->portada}}" style="width: 150px; height: 150px; border-radius: 15px;"></a>
                </td>
                <td>
                    <div style="text-overflow: ellipsis; height: 100px; overflow: hidden;">
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
        @endif
    @endforeach
    </table>
</div>
<!--  para mostrar una tabla   -->
<div class="productosP">
    <table><p style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 25px; font-weight:bold">Recomendados</p>
        @php
            $salto=0;
        @endphp
    @foreach ($rec as $producto)
    @if ($salto==0)
    <tr>
    @endif
    @if ($producto->estado==0 || $producto->cantidad==0)

    @else
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
        @endif
    @endforeach
    </table>
</div>
<!--  para mostrar una tabla   -->
    </div>
</main>
