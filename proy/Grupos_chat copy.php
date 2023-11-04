<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>

    <!-- <link rel="stylesheet" type="text/css" href="MyStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/chatstyle.css">
    <link rel="stylesheet" type="text/css" href="../css/Grupos.css">
    <link rel="stylesheet" type="text/css" href="../css/ventanasEmegentes/VE_Miembros.css">
    <!-- icono de la pagina -->
    <link rel="icon" href="../icon/bisonte.ico" type="image/x-icon">



    <link rel="stylesheet" type="text/css" href="../css/barraSuperior.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <script src="/js/barraSuperior.js"></script> -->
    <script src="../js/VentanaEmergente.js"></script>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //   // Selecciona el enlace por su ID
        //   var registroLink = document.getElementById("registroLink");
        
        //   // Agrega un evento de clic al enlace
        //   registroLink.addEventListener("click", function (event) {
        //     event.preventDefault(); // Evita el comportamiento predeterminado del enlace
        //     window.location.href = "inicio.html"; // Redirige a otro.html
        //   });
        // });
    </script>
    <style>
        /* Estilos básicos para el chat y la bandeja de chats */
        /* body {font-family: Arial, Helvetica, sans-serif;} */
       
        /*
        body {
            font-family: Arial, sans-serif;
        }
        */
        /* html{
  background: var(--gris-bisonte);
background: radial-gradient(circle, var(--azul-bisonte) 0%, var(--rojo-bisonte) 100%);
} */


        .chat-sidebar {
            width: 30%;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .chat-main {
            
            flex-grow: 1;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .chat-list {
            list-style: none;
            padding: 0;
        }

        .chat-list-item {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
        }

        .chat-list-item:last-child {
            border-bottom: none;
        }

        .chat-message {
            background-color: #e2e2e2;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .chat-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .send-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            
        }
        .chat-icon {
            margin-right: 10px; /* Espacio entre la imagen y el texto */
            vertical-align: middle; /* Alinea verticalmente la imagen con el texto */
        
            /* display: block; */
            width: 30px;/* Ajusta el ancho según tus necesidades */
            height: 30px;/* Ajusta la altura según tus necesidades */
            
            /* position: relative; */
            background-color: #E4E8F0;
            border-radius: 50%;
        }

    </style>
</head>
<body>
    <?php
                 // Realizar la consulta a la base de datos
                  
                  $username = $_GET['username'];
                  $id_grupo = $_GET['id_grupo'];
                  $grupo = $_GET['grupo'];

                  
                ?>
    <header>
        <a href="#" class ="imagenUsuario">
            <img src="../img/user.jpeg" alt = "User" >
            <h3 id="NombreUsurio"><?php echo $username; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="Grupos.php?username=<?php echo urlencode($_GET['username']); ?>">Grupos</a>
            <a id="ChatBarraSuperior" class ="nav_link selected " href="#">Chats</a>
            <a id="InsigniasBarraSuperior" class ="nav_link" href="#">Insignias</a>
            <a id="TareasBarraSuperior" class ="nav_link" href="#">Tareas</a>
            <a class ="nav_link" href="#">
                <i class='bx bxs-log-out bx-flip-horizontal' ></i>
            </a>
        </nav>
        
    </header>

    
    <div class="chat-container">
        
        
        <div class="chat-main">
            
            <div id="chat-content">
                <!-- Contenido del chat actual -->
            </div>
            <div class="usuario-seleccionado">
                <div class="avatar ">
                    
                    <img class="tamañoImagengrupoPanel" src="../img_grupos/gatitoPuño.jpg" alt="img" >
                    <!-- <i class='bx bxs-group'   ></i> -->
                </div>
                <div class="cuerpo">
                    <span><?php echo $grupo; ?></span>
                    <!-- <span>Activo - Escribiendo...</span> -->
                </div>
                <div class="opciones">
                    <ul> 
                        <!-- <li >
                            <button type="button" style="background-color: rgba(17, 40, 102, 0.719);"#007bff title="Muro"><i class='bx bx-home' ></i>
                            </li>  -->
                        <!-- <li>
                            <button type="button" title="Agregar Miembro"><i class='bx bxs-user-plus'></i>
                        </li>
                        <li>
                            <button type="button" title="Eliminar Miembro"><i class='bx bxs-user-minus'></i>
                        </li> -->
                        <li >
                            <button onclick="mostrarVentanaEmergente()"  type="button"  title="Agregar Membros" ><i class='bx bxs-user-plus'></i>
                                
                        </li>
                        <li >
                            <button onclick="mostrarVentanaEmergenteMiembros()" type="button"  title="Miembros" ><i class='bx bx-user'></i>
                        </li>  
                        <!-- <li >
                            <button type="button"  title="Crear SubGrupos"><i class='bx bx-list-plus'></i>
                        </li>  -->
                        <li >
                            <!-- <button type="button"  title="SubGrupos"  ></button><i class='bx bx-list-ul'></i> -->
                                
                                    
                                    <a id="TareasBarraSuperior" class ="nav_link" href="../php/SubGrupos.html">
                                        <button style="width: 110px; border-radius:0% ;" type="button"  title="SubGrupos">SubGrupos
                                        <i class='bx bx-list-ul'></i>
                                        </button>
                                            
                                    
                                    </a> 
                                
                        </li> 
                        <li >
                            <button type="button" style="background-color: rgba(255, 0, 0, 0.534);"#007bff title="Eliminar Grupo" ><i class='bx bxs-trash'></i>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="panel-chat">
                <!-- <div id="home">
                <div class="publiacion">
                        <div class="avatar">
                        <img src="/imagenes_usuarios/gatitochamba.jpg" alt="img">
                        
                        </div>
                    <div class="cuerpo">
                        <span style=" font-weight: bold;">Grupo 1</span>

                        <div class="texto">
                           Cosas Grupo 1
                             <span class="tiempo">
                                <i class="bx bx-time-five"></i>
                                Hace 5 min
                            </span> 
                        </div>

                    </div>
                </div>
                <div class="publiacion">
                    <div class="avatar">
                    <img src="/imagenes_usuarios/gatitochamba.jpg" alt="img">
                    
                    </div>
                <div class="cuerpo">
                    <span style=" font-weight: bold;">Grupo 1</span>

                    <div class="texto">
                       Cosas Grupo 1
                         <span class="tiempo">
                            <i class="bx bx-time-five"></i>
                            Hace 5 min
                        </span> 
                    </div>

                </div>
                
                </div>


                </div> -->
                <div id="miembros">
                    <div class="publiacion">
                            <div class="avatar ">
                            <img class="tamañoImagengrupoPanel2" src="../img_grupos/gatitoPuño.jpg" alt="img">
                            <!-- <i class="bx bxs-group"></i> -->
                            </div>
                        <div class="cuerpo">
                            <span style=" font-weight: bold;">Grupo 2</span>
    
                            <div class="texto">
                               Cosas Grupo 2
                                 <span class="tiempo">
                                    <i class="bx bx-time-five"></i>
                                    Hace 5 min
                                </span> 
                            </div>
    
                        </div>
                    </div>
                    <div class="publiacion">
                        <div class="avatar ">
                        <img class="tamañoImagengrupoPanel2" src="../img_grupos/gatitoPuño.jpg" alt="img">
                        <!-- <i class="bx bxs-group"></i> -->
                        </div>
                    <div class="cuerpo">
                        <span style=" font-weight: bold;">Grupo 2</span>

                        <div class="texto">
                           Cosas Grupo 2
                             <span class="tiempo">
                                <i class="bx bx-time-five"></i>
                                Hace 5 min
                            </span> 
                        </div>

                    </div>
                </div>
    
    
                    </div>

            </div>
            <div class="panel-escritura">
                 <form class="textarea" action="enviarm.php" method="post">
                 <input type="hidden" name="usuario" value="">
                 <input type="hidden" name="usuario2" value="">
                 <input type="hidden" name="ID2" value="">
                     <div class="opcines">
                         <button type="button">
                             <i class="bx bx-file-blank" style="color: black;"></i>
                             <label for="file"></label>
                             <input type="file" id="file">
                         </button>
                         <button type="button">
                             <i class="bx bx-image" style="color: black;" ></i>
                             <label for="img"></label>
                             <input type="file" id="img">
                         </button>
                     </div>
                     <textarea id="mensaje" name="mensaje" placeholder="Escribir mensaje"></textarea>
                    
                     <button type="submit" class="enviar"> <!-- Agregamos onclick -->
                      <i class="bx bxs-send"></i>
                     </button>
                 </form>

                 </div>
        </div>
        
        

        
    </div>


<!-- ventana emergente  agregar miembros-->
<div id="miVentanaEmergente" class="popup">
    <div class="popup-content" >
        <button type="button" class="close-button" onclick="cerrarVentanaEmergente()">&times;</button>
        
        <form>
            <div class="chat-main">
            
                <div id="chat-content">
                    <!-- Contenido del chat actual -->
                </div>
                <div class="usuario-seleccionado">
                    <div class="input-buscar">
                        <input type="search" placeholder="Buscar usuario">
                        <button class="button-search"><i class='bx bx-search-alt-2'></i></button>
                    </div>
                </div>
                <div class="panel-chat">
                <ul class="chat-list">
                <li class="chat-list-item" id="chat1" onclick="mostrarInfoUsuario('chat1')">
                    
                    
                    
                    <div class="usuario-info-chat">
                    <img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon_V2">
                    </div>
                    <span> gatito chamba</span> 
                    
                </li>
                <li class="chat-list-item" id="chat2" onclick="mostrarInfoUsuario('chat2')">
                    <div class="usuario-info-chat">
                        <img src="../imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon_V2">
                        <!-- <span class="estado-usuario enlinea"></span> -->
                        
                    </div>
                    <span>Gato guitarra</span>
                </li>
                <li class="chat-list-item" id="chat3" onclick="mostrarInfoUsuario('chat3')">
                    <div class="usuario-info-chat">
                        <img src="../imagenes_usuarios/bob.jpg" alt="Chat 3" class="chat-icon_V2">
                    
                        
                    </div>
                    <span>Bob esponja</span>
                    
                </li>
                </ul>

    
                </div>
                <div class="info-usuario-seleccionado">

                    
                </div>
            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>
        
    </div>
</div>
<!-- ventana emergente  crear Grupo-->
<div id="miVentanaEmergenteCrearGrupos" class="popup">
    <div class="popup-content">
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteCrearGrupos()">&times;</button>

        <form>
            <div class="chat-main">
                <div class="form-group">
                    <label for="nombreGrupo">Nombre del Grupo:</label>
                    <input type="text" id="nombreGrupo" name="nombreGrupo" placeholder="Ingrese el nombre del grupo" required>
                </div>
                <div class="form-group">
                    <label for="descripcionGrupo">Descripción del Grupo:</label>
                    <textarea id="descripcionGrupo" name="descripcionGrupo" rows="4" placeholder="Ingrese la descripción del grupo" required></textarea>
                </div>
                <div class="form-group">
                    <label for="fotoGrupo">Foto del Grupo:</label>
                    <input type="file" id="fotoGrupo" name="fotoGrupo" accept="image/*" onchange="mostrarImagen()">

                    
                </div>
                <div class="form-group">
                    <img id="imagenMostrada" src="" alt="Imagen del grupo" style="max-width: 100%; display: none;">
                </div>
            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>

    </div>
</div>
<!-- ventana emergente  miembros-->
<div id="miVentanaEmergenteMiembros" class="popup">
    <div class="popup-content" >
        <button type="button" class="close-button" onclick="cerrarVentanaEmergenteMiembros()">&times;</button>
        
        <form>
            <div class="chat-main">
            


                <div class="panel-chat">
                <ul class="chat-list">
                <li class="chat-list-item" id="chat1" onclick="mostrarInfoUsuario('chat1')">
                    
                    
                    
                    <div class="usuario-info-chat" >
                    <img src="../imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon_V2">
                    </div>
                    <span> gatito chamba</span> 
                    
                    
                </li>
                <li class="chat-list-item" id="chat2" onclick="mostrarInfoUsuario('chat2')">
                    <div class="usuario-info-chat">
                        <img src="../imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon_V2">
                        <!-- <span class="estado-usuario enlinea"></span> -->
                        
                    </div>
                    <span>Gato guitarra</span>
                </li>
                <li class="chat-list-item" id="chat3" onclick="mostrarInfoUsuario('chat3')">
                    <div class="usuario-info-chat">
                        <img src="/imagenes_usuarios/bob.jpg" alt="Chat 3" class="chat-icon_V2">
                    
                        
                    </div>
                    <span>Bob esponja</span>
                    
                </li>
                </ul>

    
                </div>

            </div>

            <button type="button" class="submit-button" onclick="enviarDatos()">Enviar</button>
        </form>
        
    </div>
</div>

    
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     // Obtener referencias a los elementos de la bandeja de chats
        //     var chat1 = document.getElementById("chat1");
        //     var chat2 = document.getElementById("chat2");
        //     var chat3 = document.getElementById("chat3");
    
        //     // Obtener referencia al elemento de contenido del chat actual
        //     var chatContent = document.getElementById("chat-content");
    
        //     // Función para cambiar el contenido del chat actual
        //     function cambiarChat(contenido) {
        //         // Agregar el contenido al chat actual
        //         chatContent.innerHTML = contenido;
        //     }
    
        //     // Agregar eventos de clic a los elementos de la bandeja de chats
        //     chat1.addEventListener("click", function () {
        //         var contenidoChat1 = `
        //             <h2>Chat Actual</h2>
        //             <div class="chat-message"><img src="/imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon">Gato chamba: ¡Hola!</div>
        //             <div class="chat-message">Tú: ¿Cómo estás?</div>
        //             <div class="chat-message"><img src="/imagenes_usuarios/gatitochamba.jpg" alt="Chat 1" class="chat-icon">Gato chamba: Bien, gracias. ¿Y tú?</div>
        //             <div class="chat-message">Tú: Muy bien, gracias por preguntar.</div>
        //             <input type="text" class="chat-input" placeholder="Escribe tu mensaje aquí">
        //             <button class="send-button">Enviar</button>
        //         `;
        //         cambiarChat(contenidoChat1);
        //     });
    
        //     chat2.addEventListener("click", function () {
        //         var contenidoChat2 = `
        //             <h2>Chat Actual</h2>
        //             <div class="chat-message"> </img src="imagenes_usuarios/gatoGuitarra.jpg" alt="Chat 2" class="chat-icon">Gato guitarra: Hola, soy el gato guitarra.</div>
        //             <div class="chat-message">Tú: ¿Cómo puedo ayudarte?</div>
        //             <input type="text" class="chat-input" placeholder="Escribe tu mensaje aquí">
        //             <button class="send-button">Enviar</button>
        //         `;
        //         cambiarChat(contenidoChat2);
        //     });
    
        //     chat3.addEventListener("click", function () {
        //         var contenidoChat3 = `
        //             <h2>Chat Actual</h2>
        //             <div class="chat-message"> <img src="/imagenes_usuarios/bob.jpg" alt="Chat 3" class="chat-icon">Bob esponja: ¡Hola soy bob esponja!</div>
        //             <input type="text" class="chat-input" placeholder="Escribe tu mensaje aquí">
        //             <button class="send-button">Enviar</button>
        //         `;
        //         cambiarChat(contenidoChat3);
        //     });
        // });
    </script>
    
    <!-- <script src="script.js"></script> -->
</body>
</html>
