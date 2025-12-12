<?php
session_start();
include "conexao.php"; 

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

if ($email === '' || $senha === '') {
    echo "<script>alert('Preencha email e senha'); window.history.back();</script>";
    exit;
}

$stmt = $conexao->prepare("SELECT id, nome, email, senha FROM user WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<script>alert('E-mail ou senha incorretos'); window.history.back();</script>";
    exit;
}

if (password_verify($senha, $user['senha'])) {

    $_SESSION['user_id']  = $user['id'];
    $_SESSION['user_nome'] = $user['nome'];
    $_SESSION['user_email'] = $user['email'];

    header("Location: ../pages/home.html");
    exit;

} else {
    echo "<script>alert('E-mail ou senha incorretos'); window.history.back();</script>";
    exit;
}
?>