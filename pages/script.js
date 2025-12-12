const btnNovo = document.getElementById('btnNovo');
const modal = document.getElementById('modal');
const btnFechar = document.getElementById('btnFechar');
const formChamado = document.getElementById('formChamado');

btnNovo.addEventListener('click', () => modal.classList.add('ativo'));
btnFechar.addEventListener('click', () => modal.classList.remove('ativo'));
window.addEventListener('click', e => {
    if (e.target === modal) modal.classList.remove('ativo');
});

// ---------- SUBMIT VIA AJAX ----------
formChamado.addEventListener('submit', async (e) => {
    e.preventDefault();                      // evita o submit normal
    const submitBtn = formChamado.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;

    // coletar dados do form
    const formData = new FormData(formChamado);

    // (opcional) validação básica no cliente
    if (!formData.get('titulo') || !formData.get('descricao')) {
        alert('Preencha título e descrição.');
        return;
    }

    try {
        // feedback ao usuário
        submitBtn.disabled = true;
        submitBtn.textContent = 'Enviando...';

        // envio via fetch (POST) para o endpoint PHP
        const resp = await fetch('/php/criar_chamado.php', {
            method: 'POST',
            body: formData,
            credentials: 'same-origin' // envia cookies de sessão se houver
        });

        // checa status HTTP
        if (!resp.ok) throw new Error('Erro de rede: ' + resp.status);

        const data = await resp.json();

        if (data.success) {
            // sucesso: atualiza UI, fecha modal, limpa form
            modal.classList.remove('ativo');
            formChamado.reset();

            // exemplo: adicionar item novo à lista (simples)
            const lista = document.querySelector('.chamados ul') || null;
            if (lista) {
                const li = document.createElement('li');
                li.innerHTML = `<span class="status verde"></span> ${data.chamado.titulo} <small>(Novo)</small>`;
                lista.prepend(li);
            }

            alert('Chamado criado com sucesso!');
        } else {
            // caso o PHP retorne success=false
            alert(data.message || 'Erro ao criar chamado');
        }
    } catch (err) {
        console.error(err);
        alert('Erro ao enviar chamado. Veja console.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    }
});
