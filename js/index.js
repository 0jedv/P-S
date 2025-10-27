let tarjetas = 3; // Contador inicial

/**
 * Añade una nueva tarjeta de jugador al formulario.
 */
function añadirTarjeta() {
    // Incrementamos el contador PRIMERO para usar el valor correcto en el ID
    tarjetas++; 

    // 1. Crear el HTML de la nueva tarjeta DENTRO de la función.
    // Usamos 'tarjetas' para generar un ID único (ej: tarjeta-jugador-4)
    const nuevaTarjetaHTML = `
        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador" id="tarjeta-jugador-${tarjetas}">
            <div class="card p-4 d-flex gap-2">
                <input type="text" name="nombres[]" placeholder="Nombre">
                <input type="file" name="fotos[]" accept="image/*">
                
                <button type="button" class="btn btn-danger mt-2" onclick="quitarTarjeta(this)">Eliminar Jugador</button>
            </div>
        </div>
    `;

    // 2. Obtener el contenedor
    const contenedorJugadores = document.getElementById('contenedorJugadores');

    // 3. Insertar el nuevo HTML dentro del contenedor
    contenedorJugadores.insertAdjacentHTML('beforeend', nuevaTarjetaHTML);
    
}

/**
 * Elimina la tarjeta específica que contiene el botón pulsado.
 * @param {HTMLElement} boton El botón 'Eliminar Jugador' que fue clickeado (pasado como 'this').
 */
function quitarTarjeta(boton) {
    // Comprobamos que no borramos menos de 3 (las iniciales)
    if (tarjetas > 3) {
        // Usa .closest() para encontrar el ancestro <div class="tarjeta-jugador">
        const tarjetaAEliminar = boton.closest('.tarjeta-jugador');  // closest solo funciona con selectores de css, no de js ni php
        
        if (tarjetaAEliminar) {
            tarjetaAEliminar.remove(); 
            tarjetas--;
            console.log(`Tarjeta eliminada. Total: ${tarjetas}`); 
        }
    } else {
        alert("Debes mantener un mínimo de 3 jugadores.");
    }
}