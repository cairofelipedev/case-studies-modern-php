<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Registro de usuário</title>
</head>

<body>
  <h1>Registro de usuário</h1>
  <form action="./controllers/add_user.php" method="post" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required><br>
    <input type="file" id="imagem" name="imagem">
    <input type="submit" value="Registrar">
  </form>
</body>

</html>