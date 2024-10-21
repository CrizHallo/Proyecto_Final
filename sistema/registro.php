<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $rut = $_POST['rut'];
    $fecha_nacimiento = $_POST['dob'];
    $telefono = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que las contraseñas coincidan
    if ($password !== $confirm_password) {
        echo "Las contraseñas no coinciden.";
        exit();
    }

    // Encriptar la contraseña
    $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, rut, fecha_nacimiento, telefono, email, password) 
            VALUES ('$nombre', '$rut', '$fecha_nacimiento', '$telefono', '$email', '$password_encrypted')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Location: iniciar_sesion.html"); // Redirigir a la página de inicio de sesión
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "check_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar si los datos fueron enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $rut = $_POST['rut'];
    $fecha_nacimiento = $_POST['dob'];
    $telefono = $_POST['phone'];
    $gmail = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre, rut, fecha_nacimiento, telefono, gmail, password) 
            VALUES ('$nombre', '$rut', '$fecha_nacimiento', '$telefono', '$gmail', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
        header("Location: inicio.html"); // Redirigir a la página de inicio de sesión
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
