<?php
// Conectar ao banco de dados usando a classe PDO
$pdo = new PDO('mysql:host=localhost;dbname=meubanco', 'root', 'root');

// Verificar se o ID do cliente foi enviado
if (!empty($_GET['id'])) {
  // Obter o ID do cliente
  $id = $_GET['id'];

  // Verificar se o formulário foi enviado
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Atualizar o cliente
    atualizarCliente($id, $nome, $email, $telefone);

    // Redirecionar para a página de lista de clientes
    header('Location: listar_clientes.php');
    exit();
  }

  // Obter o cliente a ser editado
  $cliente = obterCliente($id);
} else {
  // Redirecionar para a página de lista de clientes se o ID do cliente não for fornecido
  header('Location: clientes.php');
  exit();
}

// Função para obter um cliente pelo ID
function obterCliente($id)
{
  global $pdo;
  $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Função para atualizar um cliente
function atualizarCliente($id, $nome, $email, $telefone)
{
  global $pdo;
  $stmt = $pdo->prepare("UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefone', $telefone);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
?>