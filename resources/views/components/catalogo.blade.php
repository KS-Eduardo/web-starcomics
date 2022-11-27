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

        <p class="AdminText" style="font-size: 36px; margin-left: 3%;">Resultados de: {{$palabra}}</p>
        <!--  para mostrar una tabla   -->
            @php
                $salto=0;
            @endphp
            @foreach ($productos as $producto)
            @if ($salto==0)
            @endif
            @if ($producto->estado==0 || $producto->cantidad==0)

            @else
            <tr>
                <table style="margin-left: auto; margin-right: auto; width: 80vw; height: 300px; background-color: lightgray; margin-top: 1%; margin-bottom: 1%; border-radius: 15px;">
                    <tr>
                        <td style="width: 20vw">
                            <a onclick="local('{{$producto->categoria}}')"  href="/productos/detalle/{{$producto->id}}">
                                <img src="/storage/{{$producto->portada}}" style="width: 270px; height: 270px; margin-left: 3%; border-radius: 15px;"></a>
                        </td>

                        <td style="width: 40vw;">
                            <p class="AdminText" style="font-size: 30px;">{{$producto->nombre}}</p>
                            <p class="AdminText" style="font-size: 24px;">{{$producto->categoria}}</p>
                            <p class="AdminText" style="font-size: 24px;">{{$producto->genero}}</p>
                        </td>

                        <td style="width: 20vw;">
                            <span class="AdminText" style="font-size: 34px;">Precio: ${{$producto->precio}}</span>
                        </td>
                    </tr>
                </table>
            </tr>
            @if ($salto==4)
            @php
                $salto=-1;
            @endphp
            @endif
            @php
                    $salto++;
                @endphp
                @endif
            @endforeach
        <!--  para mostrar una tabla   -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    function local(categoria) {
            let visitados = JSON.parse(localStorage.getItem('visitados'));

            if (visitados==null)
            {
                console.log(categoria);
                visitados = [{Manga: 0,
                    Figura: 0,
                    Comic: 0}];
                switch (categoria)
                {
                    case "Manga":
                    visitados[0].Manga= visitados[0].Manga+1;
                    break;
                    case "Comic":
                    visitados[0].Manga= visitados[0].Manga+1;
                    break;
                    case "Figura":
                    visitados[0].Manga= visitados[0].Manga+1;
                    break;
                }
                 localStorage.setItem('visitados',JSON.stringify(visitados));

            }
            else
            {
                switch (categoria)
                {
                    case "Manga":
                    visitados[0].Manga= visitados[0].Manga+1;
                    break;
                    case "Comic":
                    visitados[0].Comic= visitados[0].Comic+1;
                    break;
                    case "Figura":
                    visitados[0].Figura= visitados[0].Figura+1;
                    break;
                }
                localStorage.setItem('visitados',JSON.stringify(visitados));
            }
        }
</script>



    <div style="display: flex; justify-content: center;">
        <div class="pagination">
            {{$productos->links()}}

            <!--<a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#" class="active">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>-->
        </div>
    </div>
        <style>

        </style>
    </div>

</main>
