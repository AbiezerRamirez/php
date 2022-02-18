let pedido = [];
let productos;


// Datos para la busqueda
const datosBusqueda = {
    minimo: '',
    maximo: '',
}


function dibujarProductos(productos) {

    $(".grid").empty();

    productos.forEach(producto => {

        $(".grid").append(`
        <div class="producto">
            <img class="producto__imagen" src="img/${producto.foto}" alt="imagen comida">
            <div class="producto__informacion">
                <p class="producto__nombre">${producto.nombre}</p>
                <p class="producto__precio">${producto.precio}€</p>
                <p class="producto__anadir"><a href="#" class="producto__anadir--anadir">Añadir al carrito</a></p>
                <p style="display: none" class="producto__id">${producto.idplato}</p>
            </div>
        <!-- </a> -->
    </div>
    `);

    })
    $(".producto__anadir--anadir").on("click", anadirProducto);
}


function actualizarProducto() {
    let cantidad = $(this).spinner("value");
    let nombre = $(this).attr("id");
    let encontrado = false;

    for (let producto2 of pedido) {
        if (producto2.nombre.replace(/ /g, "") == nombre) {
            producto2.cantidad = cantidad;
            encontrado = true;
            break;
        }
    }

    if (!encontrado)
        pedido = [...pedido, producto];

    cargarHTML();
};


function anadirProducto(e) {
    e.preventDefault();

    const producto = {
        nombre: $(this).parents(".producto").find(".producto__nombre").text(),
        precio: $(this).parents(".producto").find(".producto__precio").text(),
        id: $(this).parents(".producto").find(".producto__id").text(),
        imagen: $(this).parents(".producto").children("img").attr("src"),
        cantidad: 1
    }

    let encontrado = false;
    for (let producto2 of pedido) {
        if (producto2.nombre === producto.nombre) {
            producto2.cantidad++;
            encontrado = true;
            break;
        }
    }

    if (!encontrado)
        pedido = [...pedido, producto];

    cargarHTML();
}



function cargarHTML() {

    $("#lista-carrito tbody").empty();

    pedido.forEach(producto => {
        const row = `<tr>
             <td>  
                  <img src="${producto.imagen}" width=100>
             </td>
             <td class="nombre">${producto.nombre}</td>
             <td>${producto.precio}</td>

             <td>
             <input type="text" name="cantidad" id="${producto.nombre.replace(/ /g, "")}"></input>
             </td>

             <td>
                <a href="#" class="borrar">X</a>  
             </td></tr>
        `;

        $("#lista-carrito tbody").append(row);
        $(`#${producto.nombre.replace(/ /g, "")}`).spinner({
            step: 1,
            min: 1,
            max: 20,
        });
        $(`#${producto.nombre.replace(/ /g, "")}`).spinner("value", producto.cantidad);
        $(`#${producto.nombre.replace(/ /g, "")}`).on("spinchange", actualizarProducto);

    });

    $(".borrar").on("click", borrar);

    sessionStorage.setItem('carrito', JSON.stringify(pedido));
}

function vaciar() {
    pedido = [];

    $("#lista-carrito tbody").empty();
    sessionStorage.removeItem('carrito');
}

function borrar(e) {
    e.preventDefault();
    nombre = $(this).parents("tr").find(".nombre").text();

    const pedido2 = [];
    for (let producto2 of pedido) {
        if (producto2.nombre != nombre)
            pedido2.push(producto2);
    }

    pedido = [...pedido2];
    cargarHTML();
}

function filtrarMinimo(producto) {
    if (datosBusqueda.minimo) {
        return producto.precio >= datosBusqueda.minimo;
    }
    return producto;
}

function filtrarMaximo(producto) {
    if (datosBusqueda.maximo) {
        return producto.precio <= datosBusqueda.maximo;
    }
    return producto;
}

function filtrarProductos() {
    const resultado = productos.filter(filtrarMinimo).filter(filtrarMaximo);
    dibujarProductos(resultado);
}


function finalizarPedido() {
    let total = 0;
    let descuento = 0;
    let platos = [];
    pedido.forEach(producto => {
        let cantidad;
        parseInt(producto.cantidad) < 1 ? cantidad = 1 : cantidad = parseInt(producto.cantidad);
        let plato = {
            idplato: producto.id,
            cantidad: cantidad,
            precio: producto.precio.split('€').join('')
        };
        platos.push(plato);
        total += parseInt(producto.precio.split('€').join('') * cantidad);
    });

    if ($('#descuento').prop('checked')) {
        descuento = (total * 0.1)
        total -= descuento;
    }

    let data = {
        formapago: $('#fPago').val(),
        total: total,
        descuento: descuento,
        detalle: platos
    }

    $.ajax({
        type: "POST",
        url: "app/controllers/BackController.php?action=buy",
        data: data,
        success: function (respuesta) {
            $( "#dialog" ).dialog({
                title: "Compra Finalizada",
                show: {
                  effect: "blind",
                  duration: 200
                },
                hide: {
                  effect: "explode",
                  duration: 200
                }
              });
            $("#dialog").empty();
            $("#dialog").append(`<p>${respuesta.mensaje}</p>`);
            vaciar();
            $('#carrito').dialog("close");
        },
        error: function (respuesta) {
            $( "#dialog" ).dialog({
                title: "Error",
                show: {
                  effect: "blind",
                  duration: 200
                },
                hide: {
                  effect: "explode",
                  duration: 200
                }
              });
            $("#dialog").empty();
            $("#dialog").append(`<p>${respuesta.responseJSON.mensaje}</p>`);
        }
    });
}

$(function () {
    pedido = JSON.parse(sessionStorage.getItem('carrito')) || [];
    cargarHTML();

    $("#preciosMM").slider({
        min: 0,
        max: 30,
        step: 1,
        range: true,
        values: [0, 30],
        slide: function () {
            $("#precio").text($('#preciosMM').slider('values', 0) + " - " + $('#preciosMM').slider('values', 1));
            datosBusqueda.minimo = Number($('#preciosMM').slider('values', 0));
            datosBusqueda.maximo = Number($('#preciosMM').slider('values', 1));
            filtrarProductos();
        }
    });

    $("#carrito").dialog({
        title: "Carrito de la compra",
        autoOpen: false,
        modal: false,
        minWidth: 600,
        draggable: true,
        buttons: {
            "Vaciar Carrito": function () { vaciar() },
            "Finalizar": finalizarPedido,
            "Cerrar": function () { $(this).dialog("close"); }
        }
    });

    $("#iconoCarrito").on("click", function (e) {
        e.preventDefault();
        $("#carrito").dialog("open");
    });

    let url = window.location.href.split('/');
    let re = new RegExp('^index.php');
    if (re.test(url[url.length - 1])) {
        url.pop();
    }
    url = url.join('/');

    $.ajax({
        url: `${url}/API/v1/platos`,
        dataType: 'json',
        success: function (data) {
            productos = data;
            dibujarProductos(data);
        }
    });
});


