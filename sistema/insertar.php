<?php
// insertar.php
include("conexion.php");
$con = conectar();

$nombre = $_POST['nombre'];
$rut = $_POST['rut'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

$sql = "INSERT INTO usuarios (nombre, rut, fecha_nacimiento, telefono, email, password) VALUES ('$nombre', '$rut', '$fecha_nacimiento', '$telefono', '$email', '$password')";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: index.php");
} else {
    echo "Error al insertar";
}
?>
