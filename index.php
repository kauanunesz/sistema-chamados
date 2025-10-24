<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main>
    <section class="left">
      <img src="img/img-login.png" alt="login ilustrativo">
    </section>

    <section class="right">
      <form action="pages/chamados.php" method="post">
        <label for="email">
        </label>
        <input type="email" id="email" name="email" required>

        <label for="senha">senha</label>
        <input type="password" id="senha" required>
        <button type="submit" onclick="location.href='pages/chamados.php'">LOGIN</button>        

        </form>
        <p>não tem uma conta? <a href="pages/cadastro.php">cadastre-se</a></p>
    </section>
  </main>
</body>
</html>