<?php
include("conexion.php");

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>RUT</th>
<th>Fecha de Nacimiento</th>
<th>Teléfono</th>
<th>Email</th>
<th>Acciones</th>
</tr>";

while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['rut'] . "</td>";
    echo "<td>" . $row['fecha_nacimiento'] . "</td>";
    echo "<td>" . $row['telefono'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>
        <a href='editar.php?id=" . $row['id'] . "'>Editar</a> | 
        <a href='eliminar.php?id=" . $row['id'] . "'>Eliminar</a>
    </td>";
    echo "</tr>";
}
echo "</table>";
?>
