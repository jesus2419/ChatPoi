// document.addEventListener("DOMContentLoaded",   function   (){
//         // Obtener referencia al elemento de contenido del chat actual
//         var chatContent = document.getElementById("chat-content");
        
//         // Obtener referencias a los elementos del primer nav
//             var GuposBarraSuperior = document.getElementById("GuposBarraSuperior");
//             var ChatBarraSuperior = document.getElementById("ChatBarraSuperior");
//             var InsigniasBarraSuperior = document.getElementById("InsigniasBarraSuperior");
//             var TareasBarraSuperior = document.getElementById("TareasBarraSuperior");

//             // Obtener referencia al elemento de contenido del chat actual
//             var chatContent = document.getElementById("Menu");
    
//             // Función para cambiar el contenido del chat actual
//             function cambiarMenu(contenido) {
//                 // Agregar el contenido al chat actual
//                 chatContent.innerHTML = contenido;
//             }
    
//             // Agregar eventos de clic a los elementos de la bandeja de chats
//             GuposBarraSuperior.addEventListener("click", function () {
//                 var contenidoGuposBarraSuperior = `
//                 <div id="GruposMenu">
//                 <a class ="nav_link" href="#">Gupos</a>
//                 <a class ="nav_link" href="#">SubGrupos</a>
//                 </div>
                    
//                 `;
//                 cambiarMenu(contenidoGuposBarraSuperior);
//             });
    
//             ChatBarraSuperior.addEventListener("click", function () {
//                 var contenidoChatBarraSuperior = `
//                 <div id="ChatMenu">
//                 <a class ="nav_link" href="#">Chat</a>
//                 </div>
                    
//                 `;
//                 cambiarMenu(contenidoChatBarraSuperior);
                
//             });

//             InsigniasBarraSuperior.addEventListener("click", function () {
//                 var contenidoInsigniasBarraSuperior = `
//                 <div id="InsigniasMenu">
//                 <a class ="nav_link" href="#">Insignia</a>
//                 <a class ="nav_link" href="#">Crear</a>
//                 </div>
                    
//                 `;
//                 cambiarMenu(contenidoInsigniasBarraSuperior);
//             });

//             TareasBarraSuperior.addEventListener("click", function () {
//                 var contenidoTareasBarraSuperior = `
//                 <div id="TareasMenu">
//                 <a class ="nav_link" href="#">Tareas</a>
//                 <a class ="nav_link" href="#">Crear</a>
//                 </div>
                    
//                 `;
//                 cambiarMenu(contenidoTareasBarraSuperior);
//             });
        

// } )
/* limpar contendio del panel derecho*/ 
document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencia al elemento de contenido del chat actual
    var chatContent = document.getElementById("chat-content");

    // Obtener referencias a los elementos del primer nav
    var GruposBarraSuperior = document.getElementById("GuposBarraSuperior");
    var ChatBarraSuperior = document.getElementById("ChatBarraSuperior");
    var InsigniasBarraSuperior = document.getElementById("InsigniasBarraSuperior");
    var TareasBarraSuperior = document.getElementById("TareasBarraSuperior");

    // Función para cambiar el contenido del chat actual
    function cambiarContenido(contenido) {
        // Limpiar el contenido actual
        chatContent.innerHTML = "";
        // Agregar el nuevo contenido al chat actual
        chatContent.innerHTML = contenido;
    }

    // Agregar eventos de clic a las opciones del primer nav
    GruposBarraSuperior.addEventListener("click", function () {
        var contenidoGruposBarraSuperior = `
            <!-- Contenido para la opción "Grupos" -->
        `;
        cambiarContenido(contenidoGruposBarraSuperior);
    });

    ChatBarraSuperior.addEventListener("click", function () {
        var contenidoChatBarraSuperior = `
            <!-- Contenido para la opción "Chats" -->
        `;
        cambiarContenido(contenidoChatBarraSuperior);
    });

    InsigniasBarraSuperior.addEventListener("click", function () {
        var contenidoInsigniasBarraSuperior = `
            <!-- Contenido para la opción "Insignias" -->
        `;
        cambiarContenido(contenidoInsigniasBarraSuperior);
    });

    TareasBarraSuperior.addEventListener("click", function () {
        var contenidoTareasBarraSuperior = `
            <!-- Contenido para la opción "Tareas" -->
        `;
        cambiarContenido(contenidoTareasBarraSuperior);
    });

    // Cargar contenido inicial (Chats)
    var contenidoInicial = `
        <!-- Contenido inicial para la opción "Chats" -->
    `;
    cambiarContenido(contenidoInicial);
});


