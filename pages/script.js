const btnNovo = document.getElementById('btnNovo');
const modal = document.getElementById('modal');
const btnFechar = document.getElementById('btnFechar');

btnNovo.addEventListener('click', () => modal.classList.add('ativo'));
btnFechar.addEventListener('click', () => modal.classList.remove('ativo'));
window.addEventListener('click', e => {
    if (e.target === modal) modal.classList.remove('ativo');
});