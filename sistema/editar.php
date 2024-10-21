<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id']; // Obtenemos el ID del usuario a editar
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="css/style.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
     crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Usuario</h2>
        <form action="actualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="text" class="form-control mb-3" name="nombre" value="<?php echo $row['nombre'] ?>" required>
            <input type="text" class="form-control mb-3" name="rut" value="<?php echo $row['rut'] ?>" required>
            <input type="date" class="form-control mb-3" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento'] ?>" required>
            <input type="tel" class="form-control mb-3" name="telefono" value="<?php echo $row['telefono'] ?>" required>
            <input type="email" class="form-control mb-3" name="email" value="<?php echo $row['email'] ?>" required>
            <input type="submit" class="btn btn-primary" value="Actualizar">
        </form>
    </div>
</body>
</html>


