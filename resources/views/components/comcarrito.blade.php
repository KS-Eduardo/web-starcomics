<main id="ped">

    @php
        $total=0;
        $importe=160;
    @endphp
    <h1 class="titleCar">Mi Carrito de compras</h1>
    <br>
<div id="generalCar">
    <div id="tablaP"><table >
            @if (session()->has('user'))
            @php
                $mensaje=0;
            @endphp
                @foreach ($carrito as $c)
                <tr>
                    @php
                    $mensaje++;
                    @endphp
                    <td class="tableCarMarco">
                        <div id="acomodarCarTable">
                            <div id="imgCar">
                                <img style="width: 100%; border-radius: 15px" src="/storage/{{$c->portada}}">
                            </div>

                            <div style="">
                                <span class="titleCarP">{{$c->nombre}}</span>
                                <div class="pos">
                                    <span >Detalles del producto</span><br>
                                    <span >Autor: {{$c->autor}}</span><br>
                                    <span >Genero: {{$c->genero}}</span><br>
                                </div>

                                <span class="priceCarP">Costo unitario: ${{$c->precio}}</span>
                                @php
                                    $total+=$c->precio;
                                @endphp
                                <form method="post" action="/carrito/quitar/{{$c->id}}/{{session('user')->id}}/{{$c->created_at}}">
                                    @csrf
                                    <input id="quitarCar" type="submit" value="" placeholder="Eliminar del carrito"/>
                                </form>
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach
            @endif
    </table></div>
    @if ($mensaje==0)
    <h1 class="titleCar">No tienes productos en tu carrito</h1>

    @else
    <div id="buyMyCar">
        <div >
            <h3>Detalle de la compra {{$mensaje}}</h3>
        </div>

        <div style="display: flex; flex-direction: column;">
            <div style="display: flex;">
                <div class="palabrasCar">
                    <span>Productos </span>
                </div>
                <div class="numCar">
                    <span>${{$total}}</span>
                </div>
            </div>

            <div style="display: flex;">
                <div class="palabrasCar">
                    <span>Importes adicionales</span>
                </div>
                <div class="numCar">
                    <span id="numCar">${{$importe}}</span>
                </div>
            </div>

            <hr style="width: 100%">

            <div style="display: flex;">
                <div class="palabrasCar">
                    <span>Total </span>
                </div>
                <div class="numCar">
                    <span id="numCar">${{$total+=$importe}}</span>
                </div>
            </div>
        </div>
        <br>
        <div id="buttonsCar">
            <a href="/confirmarVenta/{{$total}}">
                <input id="btnComprar" type="submit" value="Comprar" placeholder="Comprar"/>
            </a>
        </div>

    </div>

    @endif



</div>
</main>


