<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>

<body>
  <h1>Login</h1>
  <form action="./controllers/auth.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required><br>
    <input type="submit" value="Entrar">
  </form>
</body>

</html>