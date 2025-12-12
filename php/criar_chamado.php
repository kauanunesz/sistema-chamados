<?php
header('Content-Type: application/json; charset=utf-8');
session_start();
include 'conexao.php'; // deve definir $conexao (mysqli)

// --- RECEBE E SANITIZA ---
$tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : '';
$categoria = isset($_POST['categoria']) ? trim($_POST['categoria']) : '';
$urgencia = isset($_POST['urgencia']) ? trim($_POST['urgencia']) : '';
$titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
$descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';

// (opcional) ID do usuário vindo da sessão
$userId = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : null;

// checagem mínima
if ($titulo === '' || $descricao === '') {
    echo json_encode(['success' => false, 'message' => 'Título e descrição são obrigatórios.']);
    exit;
}

// (opcional) verificar autenticação
if (!$userId) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado.']);
    exit;
}

// --- INSERÇÃO NO BANCO (prepared statement) ---
$stmt = $conexao->prepare("INSERT INTO chamados (user_id, tipo, categoria, urgencia, titulo, descricao, status, created_at) VALUES (?, ?, ?, ?, ?, ?, 'novo', NOW())");
if (!$stmt) {
    error_log("Prepare falhou: " . $conexao->error);
    echo json_encode(['success' => false, 'message' => 'Erro no servidor.']);
    exit;
}

$stmt->bind_param('isssss', $userId, $tipo, $categoria, $urgencia, $titulo, $descricao);

if ($stmt->execute()) {
    $chamadoId = $conexao->insert_id;

    // opcional: buscar o chamado recém-criado para enviar de volta
    $res = $conexao->query("SELECT id, user_id, tipo, categoria, urgencia, titulo, descricao, status, created_at FROM chamados WHERE id = " . (int)$chamadoId);
    $ch = $res->fetch_assoc();

    echo json_encode([
        'success' => true,
        'message' => 'Chamado criado',
        'chamado' => $ch
    ]);
} else {
    error_log("Execute falhou: " . $stmt->error);
    echo json_encode(['success' => false, 'message' => 'Erro ao salvar chamado.']);
}

$stmt->close();
exit;
