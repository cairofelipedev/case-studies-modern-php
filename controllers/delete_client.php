<?php
// Conectar ao banco de dados usando a classe PDO
$pdo = new PDO('mysql:host=localhost;dbname=meubanco', 'root', 'root');

// Verificar se o ID do cliente foi enviado
if (!empty($_GET['id'])) {
  // Obter o ID do cliente
  $id = $_GET['id'];

  // Verificar se o formulário foi enviado e se a ação é excluir
  if (!empty($_POST) && $_POST['action'] == 'excluir') {
    // Excluir o cliente
    excluirCliente($id);

    // Redirecionar para a página de lista de clientes
    header('Location: ../clientes.php');
    exit();
  }

  // Obter informações do cliente para mostrar na mensagem de confirmação
  $stmt = $pdo->prepare("SELECT nome FROM clientes WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
  $nome_cliente = $cliente['nome'];

  // Mostrar a mensagem de confirmação
  echo '<p>Tem certeza que deseja excluir o cliente "' . $nome_cliente . '"?</p>';
  echo '<form method="post">';
  echo '<input type="hidden" name="action" value="excluir">';
  echo '<button type="submit">Sim, excluir</button>';
  echo '<a href="listar_clientes.php">Não, cancelar</a>';
  echo '</form>';
} else {
  // Redirecionar para a página de lista de clientes se o ID do cliente não for fornecido
  header('Location: ../clientes.php');
  exit();
}

// Função para excluir um cliente pelo ID
function excluirCliente($id) {
  global $pdo;
  $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}
?>