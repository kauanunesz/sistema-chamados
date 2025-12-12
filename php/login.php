<?php
session_start();
include "conexao.php"; // ajuste o caminho se necessário

// Pega os dados do formulário
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

// Verificação básica
if ($email === '' || $senha === '') {
    echo "<script>alert('Preencha email e senha'); window.history.back();</script>";
    exit;
}

// Prepara o SELECT seguro
$stmt = $conexao->prepare("SELECT id, nome, email, senha FROM user WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();

// Pega o resultado
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Se o usuário não existe
if (!$user) {
    echo "<script>alert('E-mail ou senha incorretos'); window.history.back();</script>";
    exit;
}

// Verifica a senha com password_verify()
if (password_verify($senha, $user['senha'])) {

    // Login OK — cria sessão
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['user_nome'] = $user['nome'];
    $_SESSION['user_email'] = $user['email'];

    // Redireciona para a página inicial/logada
    header("Location: ../pages/home.html");
    exit;

} else {
    echo "<script>alert('E-mail ou senha incorretos'); window.history.back();</script>";
    exit;
}
?>