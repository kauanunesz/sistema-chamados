<?php
session_start();
include 'conexao.php';

$tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
$categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : '';
$urgencia = isset($_POST['urgencia']) ? trim($_POST['urgencia']) : '';
$titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
$descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';

if ($titulo === '' || $descricao === '') {
    echo "<script>alert('Preencha título e descrição.'); window.history.back();</script>";
    exit;
}

$userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : null;

if ($userId !== null) {
    $stmt = $conexao->prepare("INSERT INTO chamados (user_id, tipo, categoria, urgencia, titulo, descricao, status, created_at) VALUES (?, ?, ?, ?, ?, ?, 'novo', NOW())");
    if (!$stmt) { error_log($conexao->error); echo "<script>alert('Erro no servidor'); window.history.back();</script>"; exit; }
    $stmt->bind_param('isssss', $userId, $tipo, $categoria, $urgencia, $titulo, $descricao);
} else {
    $stmt = $conexao->prepare("INSERT INTO chamados (user_id, tipo, categoria, urgencia, titulo, descricao, status, created_at) VALUES (NULL, ?, ?, ?, ?, ?, 'novo', NOW())");
    if (!$stmt) { error_log($conexao->error); echo "<script>alert('Erro no servidor'); window.history.back();</script>"; exit; }
    $stmt->bind_param('sssss', $tipo, $categoria, $urgencia, $titulo, $descricao);
}

if ($stmt->execute()) {
    $stmt->close();
    echo "<script>alert('Chamado criado com sucesso!'); window.location.href = '/pages/chamados.html';</script>";
    exit;
} else {
    error_log("Execute falhou: " . $stmt->error);
    $stmt->close();
    echo "<script>alert('Erro ao salvar chamado.'); window.history.back();</script>";
    exit;
}