<?php
include("conexion.php");
$con = conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$rut = $_POST['rut'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

$sql = "UPDATE usuarios SET nombre='$nombre', rut='$rut', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono', email='$email' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: index.php");
} else {
    echo "Error al actualizar";
}
?>
