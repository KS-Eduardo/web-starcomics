<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Comics - Factura</title>

    <link rel="stylesheet" type="text/css" href="/css/default2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Codigo tumbado de w3schools -->
   <!-- <link rel="stylesheet" type="text/css" href="/css/default2.css">-->

</head>
<body>
    <header style="background-color: lightgray;">
        <section>
            <a class="logoS" href="{{URL::to('/')}}"><img src="/imagenes/logo.png" width="175px" style="display: block; margin-left: auto; margin-right: auto;"></a>
        </section>
    </header>

    <main>
        <p style="margin-left: 5%;" class="AdminText">Factura</p>

        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">Ticket de venta a nombre de Starcomics.</p>
        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">N° de venta: {{$ticket[0]->idVenta}}</p>
        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">Fecha: {{$ticket[0]->time}}</p>


        <table style="margin-left: auto; margin-right: auto;">
            @php
                $total=0;
            @endphp
            <tr style="background-color: lightgray;">
                <th class="AdminText" style="font-size: 20px; width: 45vw;">Descripción</th>
                <th class="AdminText" style="font-size: 20px; width: 15vw;">Cantidad</th>
                <th class="AdminText" style="font-size: 20px; width: 20vw;">Total</th>
            </tr>
            @foreach ($ticket as $f)
                <tr>
                    <td class="AdminText" style="font-size: 18px; width: 45vw;">{{$f->nombre}}</td>
                    <th class="AdminText" style="font-size: 18px; width: 15vw;">1</th>
                    @php
                        $totalp=  $f->precio;
                        $total+=$totalp;


                    @endphp
                    <td class="AdminText" style="font-size: 18px; width: 20vw;">${{$totalp}}</td>

                </tr>

            @endforeach
            <tr>
                <td class="AdminText" style="font-size: 18px; width: 45vw;">Importes adicionales</td>
                <th class="AdminText" style="font-size: 18px; width: 15vw;"></th>
                @php

                    $total+=160;


                @endphp
                <td class="AdminText" style="font-size: 18px; width: 20vw;">$160</td>

            </tr>

        </table>

        <br>

        <p class="AdminText" style="margin-right: 8%; font-size: 18px; float: right; margin-top: 0; margin-bottom: 0;">Subtotal: ${{$total}}</p>
        <br>

    </main>
</body>
</html>
