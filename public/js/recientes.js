$(document).ready(function(){
    $("td>a").click(function(){
        let ultimos = JSON.parse(localStorage.getItem('ultimos'));
        let id = p.attr("producto_id");
        if (ultimos==null)
        {
            ultimos = [{id: id}];
            localStorage.setItem('ultimos',JSON.stringify(ultimos));
        }
        else
        {
            let encontrado = false;
            for (let i=0; i<carrito.length; i++)
            {
                if (carrito[i].id == id)
                {
                    carrito[i].cantidad++;
                    encontrado = true;
                    break;
                }
            }
            if (!encontrado)
            {
                carrito.push({id: id,
                    descripcion: descripcion,
                    precio: precio,
                    cantidad:1});
            }
            localStorage.setItem('carrito',JSON.stringify(carrito));
        }
       /* let section = $(this).parent();
        let id = section.attr("producto_id");
        let descripcion = $(this).prev().prev().text();
        let precio = $(this).prev().text();
        if (==null)
        {
            carrito = [{id: id,
                    descripcion: descripcion,
                    precio: precio,
                    cantidad:1}];
            localStorage.setItem('carrito',JSON.stringify(carrito));
        }
        else
        {
            let encontrado = false;
            for (let i=0; i<carrito.length; i++)
            {
                if (carrito[i].id == id)
                {
                    carrito[i].cantidad++;
                    encontrado = true;
                    break;
                }
            }
            if (!encontrado)
            {
                carrito.push({id: id,
                    descripcion: descripcion,
                    precio: precio,
                    cantidad:1});
            }
            localStorage.setItem('carrito',JSON.stringify(carrito));
        }*/
    });
});
