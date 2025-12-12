<?php
include 'conexao.php';

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$confirmarSenha = isset($_POST['confirmarSenha']) ? $_POST['confirmarSenha'] : '';
$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
$setor = isset($_POST['setor']) ? trim($_POST['setor']) : '';

if (empty($senha) || empty($confirmarSenha) || empty($email) || empty($nome) ) 
    {
    echo "<script>
    alert('Preencha todos os campos obrigatórios.'); 
    window.history.back();
    </script>";
    exit;
    }

if ($senha !== $confirmarSenha) {
    echo "<script>
    alert('Senhas não coincidem. Tente novamente!');
    window.history.back();
    </script>";
    exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $conexao->prepare("INSERT INTO `user` (nome, email, senha, telefone, setor) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    error_log("Prepare falhou: " . $conexao->error);
    echo "<script>alert('Erro no servidor. Tente novamente mais tarde.'); window.history.back();</script>";
    exit;
}

$stmt->bind_param("sssss", $nome, $email, $senha_hash, $telefone, $setor);

if ($stmt->execute()) {
    $stmt->close();
    echo "<script>
    alert('Usuário cadastrado com sucesso!');
    location.href='../index.html';
    </script>";
    exit;
} else {
    error_log("Execute falhou: " . $stmt->error);
    $stmt->close();
    echo "<script>alert('Erro ao cadastrar usuário.'); window.history.back();</script>";
    exit;
}
?>