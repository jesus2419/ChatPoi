<?php
include('conexion.php');  // Incluye el archivo de conexión

// Obtén los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$uname = $_POST['uname'];
$password = $_POST['password'];
$telefono = $_POST['telefono'];

// Escapa caracteres especiales para evitar inyecciones de SQL
$nombre = $conn->real_escape_string($nombre);
$apellidos = $conn->real_escape_string($apellidos);
$uname = $conn->real_escape_string($uname);
$telefono = $conn->real_escape_string($telefono);
$password = $conn->real_escape_string($password);

// Crea la consulta SQL para insertar en la tabla de usuarios (cambia 'tu_tabla' al nombre de tu tabla)
$sql = "INSERT INTO usuarios (Nombre, Apellidos, NombreUsuario, UsuarioPassword, telefono) VALUES ('$nombre', '$apellidos', '$uname', '$password', '$telefono')";

// Ejecuta la consulta y verifica si fue exitosa
if ($conn->query($sql) === TRUE) {
     // Redirige a otro HTML después de un segundo (cambia 'otro_html.html' al nombre de tu HTML de destino)
     header("Location: chat.php?username=$uname");
    //echo "Registro exitoso";
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
