<?php
require "../db_config.php";

// Validação dos dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$imagem = null;

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
  $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
}

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
$sql = "INSERT INTO usuarios (nome, email, senha, imagem) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$imagem_lob = $imagem.PDO::PARAM_LOB;
$resultado = $stmt->execute([$nome, $email, $senha_criptografada, $imagem_lob]);

if ($resultado) {
  echo 'Usuário registrado com sucesso.';
} else {
  echo 'Erro ao registrar usuário.';
}
