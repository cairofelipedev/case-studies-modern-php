<!DOCTYPE html>
<html>

<head>
  <title>Adicionar Cliente</title>
</head>

<body>
  <h1>Adicionar Cliente</h1>
  <form action="./controllers/add_client.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone" required><br>

    <button type="submit">Adicionar</button>
  </form>
</body>

</html>