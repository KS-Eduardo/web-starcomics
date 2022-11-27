<main id="ped">
    @php
        $total=0;
    @endphp
    <div id="generalCar">
        <div id="tablaP"><table id="pedidos">
                @if (session()->has('user'))
                    @foreach ($deseos as $c)
                    <tr>
                        <td class="tableCarMarco">
                            <div id="acomodarCarTable">
                                <div id="imgCar">
                                    <img style="width: 100%; border-radius: 15px;" src="/storage/{{$c->portada}}">
                                </div>

                                <div style="">
                                    <span class="titleCarP">{{$c->nombre}}</span>
                                    <div class="pos">
                                        <span >Detalles del producto</span><br>
                                        <span >Autor: {{$c->autor}}</span><br>
                                        <span >Genero: {{$c->genero}}</span><br>
                                    </div>

                                    <span class="priceCarP">Costo unitario: ${{$c->precio}}</span>
                                    <form method="post" action="/carrito/quitarD/{{$c->id}}/{{session('user')->id}}/{{$c->created_at}}">
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
</main>
