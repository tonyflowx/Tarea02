<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'loginsito';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT); // Hashear la contraseña

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Este correo ya está registrado.'); window.location.href = 'createLogin.php';</script>";
    } else {
        $sql = "INSERT INTO usuarios (correo, contraseña) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $correo, $contraseña_hash);
        $stmt->execute();
        header('Location: ../pages/index.html');
        exit();
    }
}

$conn->close();
?>
