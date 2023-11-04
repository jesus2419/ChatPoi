<?php
include('conexion.php');  // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $nombre = $_POST['nombreGrupo'];
    $descripcion = $_POST['descripcionGrupo'];


    

    // El nombre de usuario ya existe, puedes mostrar un mensaje de error
    
    $usuario2 = $_POST['usuario'];
    
  
    $sql = "CALL CrearGrupoConMiembro('$nombre', '$descripcion', (SELECT ID FROM Usuarios WHERE Usuario = '$usuario2' LIMIT 1))";

    if ($conn->query($sql) === TRUE) {
        //echo "Registro insertado correctamente.";

        header("Location: Grupos.php?username=$usuario2");
       

       
    } else {
        echo "Error al insertar registro: " . $conn->error;
    }
} else {
    echo "Tamaño de la imagen demasiado grande. El tamaño máximo permitido es 1 MB.";
}
  


// Cerrar la conexión
$conn->close();
?>

