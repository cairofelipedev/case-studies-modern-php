<?php
require "../db_config.php";

// Validação dos dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (empty($nome) || empty($email) || empty($senha)) {
  echo 'Todos os campos são obrigatórios.';
  exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Endereço de email inválido.';
  exit;
}

// Criptografia da senha
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

// Inserção do novo usuário na tabela
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute([$nome, $email, $senha_criptografada]);

if ($resultado) {
  echo 'Usuário registrado com sucesso.';
} else {
  echo 'Erro ao registrar usuário.';
}
