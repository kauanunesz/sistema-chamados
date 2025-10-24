<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Cadastro</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <main>
    <section class="left">
      <img src="https://cdn-icons-png.flaticon.com/512/7856/7856540.png" alt="ilustração de cadastro">
    </section>

    <section class="right">
    <form action="../php/cad_usuario.php" method="post">
        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <label for="confirma">Confirmar senha</label>
        <input type="password" id="confirma" name="confirma" required>

        <label for="celular">Celular</label>
        <input type="tel" id="celular" name="celular" required>

        <label for="cargo">Cargo</label>
        <select name="cargo" id="cargo" name="cargo" required>
            <option value="#"></option>
        </select>

        <button type="submit">cadastre-se</button>

        <p>já tem uma conta? <a href="../index.php">faça login</a></p>
      </form>
    </section>
  </main>
</body>
</html>
