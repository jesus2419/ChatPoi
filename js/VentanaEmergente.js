// Función para mostrar la ventana emergente
function mostrarVentanaEmergente() {
    document.getElementById("miVentanaEmergente").style.display = "block";
}

// Función para cerrar la ventana emergente
function cerrarVentanaEmergente() {
    document.getElementById("miVentanaEmergente").style.display = "none";
}

// Función para procesar los datos del formulario
function enviarDatos() {
    var nombre = document.getElementById("nombre").value;
    var email = document.getElementById("email").value;
    alert("Nombre: " + nombre + "\nEmail: " + email);
    cerrarVentanaEmergente(); // Cierra la ventana después de procesar los datos (puedes personalizar esto)
}



// Función para mostrar la información del usuario seleccionado
function mostrarInfoUsuario(usuario) {
    // Obtén el elemento div donde se mostrará la información
    var infoUsuarioDiv = document.getElementById("info-usuario-seleccionado");
    
    // Actualiza el contenido del div con la información del usuario
    infoUsuarioDiv.innerHTML = "Usuario seleccionado: " + usuario;
}

// Asocia la función mostrarInfoUsuario a los elementos de la lista de chat
var listaChatItems = document.querySelectorAll(".chat-list-item");
listaChatItems.forEach(function(item) {
    item.addEventListener("click", function() {
        var nombreUsuario = item.querySelector("span").textContent;
        mostrarInfoUsuario(nombreUsuario);
    });
});


function mostrarInfoUsuario(chatId) {
    // Obtén el elemento <li> seleccionado por su ID
    const chatItem = document.getElementById(chatId);

    // Obtén el nombre y la imagen del elemento seleccionado
    const nombreUsuario = chatItem.querySelector('span').textContent;
    //const imagenUsuario = chatItem.querySelector('chat-icon_V2').getAttribute('src');



    // Actualiza <div class="info-usuario-seleccionado"> con la información
    const infoUsuarioSeleccionado = document.querySelector('.info-usuario-seleccionado');
    // <img src="${imagenUsuario}" alt="${nombreUsuario}" class="info-usuario-icon"></img>
    infoUsuarioSeleccionado.innerHTML = ` 
        
        <span>${nombreUsuario}</span>
        <button type="button" id="eliminarUsuarioButton" style="border-radius: 50%; width: 30px; padding: 5px; " onclick="eliminarUsuario()"> 
    <i class='bx bx-minus'></i>
</button>

    `;
}
function eliminarUsuario() {
    // Encuentra el elemento <div class="info-usuario-seleccionado">
    const infoUsuarioSeleccionado = document.querySelector('.info-usuario-seleccionado');

    // Verifica si el elemento existe y si sí, lo elimina
    if (infoUsuarioSeleccionado) {
        infoUsuarioSeleccionado.innerHTML = '';
    }
}
//:::::::::::::::::::::::::::::::::::crear grupo ventana emergente
/* mostrar pantalla crear grupo */ 
function mostrarVentanaEmergenteCrearGrupos() {
    document.getElementById("miVentanaEmergenteCrearGrupos").style.display = "block";
}
/* eliminar pantalla crear grupo */ 
function cerrarVentanaEmergenteCrearGrupos() {
    document.getElementById("miVentanaEmergenteCrearGrupos").style.display = "none";
}