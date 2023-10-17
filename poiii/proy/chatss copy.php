<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>

    <!-- <link rel="stylesheet" type="text/css" href="MyStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="../css/chatstyle.css">
    
 <!-- icono de la pagina -->
 <link rel="icon" href="../icon/bisonte.ico" type="image/x-icon">


    <link rel="stylesheet" type="text/css" href="../css/barraSuperior.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../js/barraSuperior.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
          // Selecciona el enlace por su ID
          var registroLink = document.getElementById("registroLink");
        
          // Agrega un evento de clic al enlace
          registroLink.addEventListener("click", function (event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            window.location.href = "inicio.html"; // Redirige a otro.html
          });
        });
    </script>
    <style>
        


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
    <header>
        <a href="#" class ="imagenUsuario">
            <img src="../img/user.jpeg" alt = "User"  >
            <h3 id="NombreUsurio"><?php echo $_GET['username']; ?></h3>
        </a>
        <nav>
            <a id="GuposBarraSuperior" class ="nav_link" href="../php/Grupos.html">Grupos</a>
            <a id="ChatBarraSuperior" class ="nav_link selected " href="../php/chat.html">Chats</a>
            <a id="InsigniasBarraSuperior" class ="nav_link" href="#">Insignias</a>
            <a id="TareasBarraSuperior" class ="nav_link" href="#">Tareas</a>
            <a class ="nav_link" href="inicio.html">
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
                    
                    <img src="../imagenes_usuarios/gatitochamba.jpg" alt="img" >
                    <span class="estado-usuario enlinea"></span>
                </div>
                <div class="cuerpo">
                    <span>Nombre de usuario</span>
                    <span>Activo - Escribiendo...</span>
                </div>
                <div class="opciones">
                    <ul>
                        <li>
                            <button type="button"><i class='bx bxs-video bx-flip-horizontal' ></i>
                        </li>
                        <li>
                            <button type="button"><i class='bx bxs-phone' ></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-chat">
                <div class="mensaje">
                    <div class="avatar">
                        <img src="../imagenes_usuarios/gatitochamba.jpg" alt="img">
                    </div>
                    <div class="cuerpo">
                        <!-- <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> -->
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class='bx bx-time-five' ></i>
                                Hace 5 min
                            </span>
                        </div>

                    </div>
                </div>
                <!-- derecha -->
                <div class="mensaje left">
                    <div class="cuerpo">
                        <!-- <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> -->
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class='bx bx-time-five' ></i>
                                Hace 6 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">
                        <img src="../img/user.jpeg" alt="img">
                    </div>
                </div>
                <div class="panel-escritura">
                    <form class="textarea">
                        <div class="opcines">
                            <button type="button">
                                <i class='bx bx-file-blank' style="color: black;"></i>
                                <label for="file"></label>
                                <input type="file" id="file">
                            </button>
                            <button type="button">
                                <i class='bx bx-image' style="color: black;" ></i>
                                <label for="img"></label>
                                <input type="file" id="img">
                            </button>
                        </div>
                        <textarea placeholder="Escribir mensaje"></textarea>
                        <button type="button" class="enviar">
                            <i class='bx bxs-send'></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        
    </div>




   
    
    
</body>
</html>
