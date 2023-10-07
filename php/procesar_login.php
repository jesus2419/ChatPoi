<?php
include('conexion.php');  // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['uname'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM usuarios WHERE NombreUsuario = '$username' AND UsuarioPassword = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Autenticación exitosa
  //  echo "Inicio de sesión exitoso.";
  header("Location: chat.php?username=$username");
  exit();
  } else {
    // Autenticación fallida
    echo "Nombre de usuario o contraseña incorrectos.";
  }
}

$conn->close();
?>
