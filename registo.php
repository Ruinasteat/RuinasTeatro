<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ruinasteatro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar se o formulário de registro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Limpar dados do formulário para evitar injeção de SQL
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Criptografar a senha
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir usuário no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, password) VALUES ('$nome', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário registrado com sucesso.";
    } else {
        echo "Erro ao registrar usuário: " . $conn->error;
    }
}

// Fechar conexão com o banco de dados
$conn->close();
?>