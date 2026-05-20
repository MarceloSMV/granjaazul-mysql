let carrito = [];

function agregarAlCarrito(btn) {
    const card   = btn.closest('.producto-card');
    const id     = card.dataset.id;
    const nombre = card.dataset.nombre;
    const precio = parseFloat(card.dataset.precio);

    const existe = carrito.find(item => item.id === id);

    if (existe) {
        existe.cantidad += 1;
        actualizarControl(card, existe.cantidad);
    } else {
        carrito.push({ id, nombre, precio, cantidad: 1 });
        mostrarControl(card, 1);
    }

    mostrarCarrito();
}

function restarDelCarrito(id) {
    const card = document.querySelector(`.producto-card[data-id="${id}"]`);
    const item = carrito.find(i => i.id === id);
    if (!item) return;

    item.cantidad -= 1;

    if (item.cantidad === 0) {
        carrito = carrito.filter(i => i.id !== id);
        restaurarBoton(card);
    } else {
        actualizarControl(card, item.cantidad);
    }

    mostrarCarrito();
}

function sumarEnCarrito(id) {
    const card = document.querySelector(`.producto-card[data-id="${id}"]`);
    const item = carrito.find(i => i.id === id);
    if (!item) return;

    item.cantidad += 1;
    actualizarControl(card, item.cantidad);
    mostrarCarrito();
}



function mostrarControl(card, cantidad) {
    const id  = card.dataset.id;
    const btn = card.querySelector('.btn-agregar');

    
    btn.style.display = 'none';

    

    let ctrl = card.querySelector('.ctrl-cantidad');
    if (!ctrl) {
        ctrl = document.createElement('div');
        ctrl.className = 'ctrl-cantidad';
        btn.parentNode.insertBefore(ctrl, btn.nextSibling);
    }

    ctrl.innerHTML = `
        <button class="btn-menos" onclick="restarDelCarrito('${id}')">-</button>
        <span class="btn-cantidad">${cantidad}</span>
        <button class="btn-mas" onclick="sumarEnCarrito('${id}')">+</button>
    `;
}


function actualizarControl(card, cantidad) {
    const ctrl = card.querySelector('.ctrl-cantidad');
    if (ctrl) {
        ctrl.querySelector('.btn-cantidad').textContent = cantidad;
    }
}


function restaurarBoton(card) {
    const btn  = card.querySelector('.btn-agregar');
    const ctrl = card.querySelector('.ctrl-cantidad');

    if (ctrl) ctrl.remove();
    btn.style.display = '';
}


function mostrarCarrito() {
    const lista = document.getElementById("carrito-lista");
    lista.innerHTML = "";

    if (carrito.length === 0) {
        lista.innerHTML = '<li class="carrito-vacio">Sin productos aun</li>';
        document.getElementById("carrito-total").textContent = "S/0";
        return;
    }

    carrito.forEach(producto => {
        const li = document.createElement("li");
        li.className = "carrito-item";
        const subtotal = producto.precio * producto.cantidad;
        li.innerHTML = `
            <span class="carrito-item-nombre">${producto.nombre}</span>
            <div class="carrito-item-derecha">
                <span class="carrito-item-cantidad">x${producto.cantidad}</span>
                <span class="carrito-item-precio">S/${subtotal}</span>
            </div>
        `;
        lista.appendChild(li);
    });

    const total = carrito.reduce((sum, item) => sum + item.precio * item.cantidad, 0);
    document.getElementById("carrito-total").textContent = "S/" + total;
}