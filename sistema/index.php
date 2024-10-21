<?php
// Incluyendo el archivo de conexión a la base de datos
include("conexion.php");
$con = conectar();

// Consulta para obtener todos los usuarios de la tabla 'usuarios'
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Gestión de Usuarios</h1>
        <div class="row">
            <!-- Formulario para ingresar nuevos usuarios -->
            <div class="col-md-3">
                <h2>Ingresar Datos</h2>
                <form action="insertar.php" method="POST">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" required>
                    <input type="text" class="form-control mb-3" name="rut" placeholder="RUT (Ej: 12345678-9)" required pattern="[0-9]{7,8}-[0-9Kk]">
                    <input type="date" class="form-control mb-3" name="fecha_nacimiento" placeholder="Fecha de Nacimiento" required>
                    <input type="tel" class="form-control mb-3" name="telefono" placeholder="Teléfono" required>
                    <input type="email" class="form-control mb-3" name="email" placeholder="Correo Electrónico" required>
                    <input type="password" class="form-control mb-3" name="password" placeholder="Contraseña" minlength="8" required>
                    <input type="submit" class="btn btn-primary" value="Registrar Usuario">
                </form>
            </div>

            <!-- Tabla que muestra los usuarios registrados -->
            <div class="col-md-8">
                <h2>Lista de Usuarios Registrados</h2>
                <table class="table table-bordered">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>RUT</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['rut'] ?></td>
                            <td><?php echo $row['fecha_nacimiento'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                              <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a>
                              <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>

                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

