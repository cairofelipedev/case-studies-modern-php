<?php
// Conectar ao banco de dados usando a classe PDO
$pdo = new PDO('mysql:host=localhost;dbname=meubanco', 'root', 'root');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obter os dados do formulário
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];

  // Criar o novo cliente
  criarCliente($nome, $email, $telefone);

  // Redirecionar para a página de lista de clientes
  header('Location: ../clientes.php');
  exit();
}

// Função para criar um novo cliente
function criarCliente($nome, $email, $telefone) {
  global $pdo;
  $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)");
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->execute();
}
?>