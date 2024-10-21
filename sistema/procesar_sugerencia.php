<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $sugerencia = $_POST['sugerencia'];
    $usuarioRegistrado = $_POST['usuarioRegistrado'] == "true" ? 1 : 0;

    // Manejar subida de imagen
    if (!empty($_FILES['imagen']['name'])) {
        $imagen = 'uploads/' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
    } else {
        $imagen = NULL;
    }

    // Insertar la sugerencia en la base de datos
    $sql = "INSERT INTO sugerencias (tipo, sugerencia, imagen, usuarioRegistrado, fecha) 
            VALUES ('$tipo', '$sugerencia', '$imagen', '$usuarioRegistrado', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Sugerencia enviada con éxito";
        header("Location: sugerencias.html"); // Redirigir después de enviar
        exit(); // Asegurar que se detenga la ejecución después de redirigir
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>



