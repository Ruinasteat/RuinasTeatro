<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ruinasteatro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Selecionar a senha criptografada do banco de dados
    $sql = "SELECT password FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verificar se a senha corresponde à versão criptografada no banco de dados
        if (password_verify($password, $hashed_password)) {
            echo "Login bem-sucedido.";
        } else {
            echo "Email ou senha inválidos.";
        }
    } else {
        echo "Email ou senha inválidos.";
    }
}

$conn->close();
?>
