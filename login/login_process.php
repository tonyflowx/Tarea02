<?php
session_start();

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

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($contraseña, $user['contraseña'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: ./../pages/index.html');
            exit();
        } else {
            header('Location: login.php?error=incorrecta');
            exit();
        }
    } else {
        header('Location: login.php?error=usuario_no_existente');
        exit();
    }
}

$conn->close();
?>
