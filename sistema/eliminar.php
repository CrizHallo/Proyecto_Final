<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: index.php");
} else {
    echo "Error al eliminar";
}
?>

