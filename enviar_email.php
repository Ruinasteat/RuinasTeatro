<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Telefone'];
    $mensagem = $_POST['Mensagem'];

    // Endereço de e-mail para onde você deseja enviar a mensagem
    $destinatario = 'vjpp29@gmail.com';

    // Assunto do e-mail
    $assunto = 'Nova mensagem do formulário de contato';

    // Monta o corpo da mensagem
    $corpo_mensagem = "Nome: $nome\n";
    $corpo_mensagem .= "Email: $email\n";
    $corpo_mensagem .= "Telefone: $telefone\n";
    $corpo_mensagem .= "Mensagem:\n$mensagem";

    // Envia o e-mail
    if (mail($destinatario, $assunto, $corpo_mensagem)) {
        // Se o e-mail foi enviado com sucesso, redireciona de volta para o formulário com uma mensagem de sucesso
        echo '<script>alert("E-mail enviado com sucesso!");</script>';
    } else {
        echo '<script>alert("Houve um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.");</script>';
    }
} else {
    // Se o formulário não foi submetido, redireciona de volta para o formulário
    header('Location: ./contact.html');
}
?>
