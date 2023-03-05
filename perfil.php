<?php
session_start();

if (!isset($_SESSION['id'])) {
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Perfil do Usuário</title>
</head>
<body>
  <h1>Perfil do Usuário</h1>
  <p><strong>Nome:</strong> <?php echo $_SESSION['nome']; ?></p>
  <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
  <p><a href="./controllers/logout.php">Sair</a></p>
</body>
</html>