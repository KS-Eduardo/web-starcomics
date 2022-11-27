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

        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">Factura a nombre de Starcomics.</p>
        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">N° de factura: {{$factura[0]->id}}</p>
        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">Fecha: {{$factura[0]->fecha}}</p>
        <p class="AdminText" style="margin-left: 8%; font-size: 20px;">Usuario que ingreso la factura: {{$factura[0]->correo}}</p>

        <table style="margin-left: auto; margin-right: auto;">
            @php
                $total=0;
            @endphp
            <tr style="background-color: lightgray;">
                <th class="AdminText" style="font-size: 20px; width: 45vw;">Descripción</th>
                <th class="AdminText" style="font-size: 20px; width: 15vw;">Cantidad</th>
                <th class="AdminText" style="font-size: 20px; width: 20vw;">Total</th>
            </tr>
            @foreach ($factura as $f)
                <tr>
                    <td class="AdminText" style="font-size: 18px; width: 45vw;">{{$f->nombre}}</td>
                    <th class="AdminText" style="font-size: 18px; width: 15vw;">{{$f->cantidad}}</th>
                    @php
                        $totalp=$f->cantidad  *  round(($f->precio/1.46));
                        $total+=$totalp;


                    @endphp
                    <td class="AdminText" style="font-size: 18px; width: 20vw;">${{$totalp}}</td>

                </tr>

            @endforeach
        </table>

        <br>

        <p class="AdminText" style="margin-right: 8%; font-size: 18px; float: right; margin-top: 0; margin-bottom: 0;">Subtotal: ${{$total}}</p>
        <br>
        @php
            $iva=$total*0.16;
            $totaliva=$total+$iva
        @endphp
        <br>
        <p class="AdminText" style="margin-right: 8%; font-size: 18px; float: right; margin-top: 0; margin-bottom: 0;">IVA 16%:${{$iva}}</p>
        <br>
        <br>
        <p class="AdminText" style="margin-right: 8%; font-size: 20px; float: right; margin-top: 0; margin-bottom: 0;">Total: ${{$totaliva}}</p>
    </main>
</body>
</html>
