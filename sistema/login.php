<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $password = $_POST['password'];

    // Verificar si el usuario existe
    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener la fila con los datos del usuario
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            echo "Inicio de sesión exitoso";
            header("Location: index.html"); // Redirigir a otra página (ej. panel de usuario)
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}

$conn->close();
?>
