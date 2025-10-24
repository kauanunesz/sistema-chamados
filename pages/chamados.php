<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chamados</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <main>
    <section class="chamados">
      <div class="header-chamados">
        <h2>Chamados</h2>
        <button id="btnNovo">+ Novo Chamado</button>
      </div>

      <ul>
        <li><span class="status verde"></span> Novo</li>
        <li><span class="status azul"></span> Em atendimento (Atribuído)</li>
        <li><span class="status amarelo"></span> Em atendimento (Planejado)</li>
        <li><span class="status laranja"></span> Pendente</li>
        <li><span class="status branco"></span> Solucionado</li>
        <li><span class="status preto"></span> Fechado</li>
        <li><span class="status cinza"></span> Excluído</li>
      </ul>
    </section>
  </main>

  <!-- Modal -->
  <div id="modal" class="modal">
    <div class="modal-content">
      <h2>Descreva seu chamado</h2>
      <form>
        <label>Tipo</label>
        <select>
          <option>Selecione</option>
        </select>

        <label>Categoria</label>
        <select>
          <option>Selecione</option>
        </select>

        <label>Urgência</label>
        <select>
          <option>Selecione</option>
        </select>

        <label>Título</label>
        <input type="text">

        <label>Descrição</label>
        <textarea></textarea>

        <button type="submit">Enviar chamado</button>
      </form>
      <button class="fechar" id="btnFechar">Fechar</button>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>