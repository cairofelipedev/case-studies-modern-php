<?php
require "../db_config.php";
// Validação dos dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($email) || empty($senha)) {
  echo 'Todos os campos são obrigatórios.';
  exit;
}

// Busca o usuário pelo email
$sql = "SELECT id, nome, email, senha FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
  echo 'Usuário não encontrado.';
  exit;
}

// Verifica a senha
if (!password_verify($senha, $usuario['senha'])) {
  echo 'Senha incorreta.';
  exit;
}

// Inicia a sessão e armazena os dados do usuário
session_start();
$_SESSION['id'] = $usuario['id'];
$_SESSION['nome'] = $usuario['nome'];
$_SESSION['email'] = $usuario['email'];

$action = "login";
$date_time = date('Y-m-d H:i:s');

$sql_log = "INSERT INTO user_logs (user_id, action, date_time) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql_log);
$result_log = $stmt->execute([$_SESSION['id'], $action, $date_time]);

// Redireciona para a página de perfil do usuário
header('Location: ../perfil.php');
exit;
