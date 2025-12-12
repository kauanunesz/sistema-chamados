document.addEventListener('DOMContentLoaded', () => {
  const btnNovo = document.getElementById('btnNovo');
  const modal = document.getElementById('modal');
  const btnFechar = document.getElementById('btnFechar');

  if (!btnNovo)   console.warn('Elemento #btnNovo não encontrado');
  if (!modal)     console.warn('Elemento #modal não encontrado');
  if (!btnFechar) console.warn('Elemento #btnFechar não encontrado');

  if (!btnNovo || !modal || !btnFechar) return;

  const openModal = () => {
    modal.classList.add('ativo');
    modal.style.display = 'block';
    modal.setAttribute('aria-hidden', 'false');
    // opcional: focar primeiro campo
    const first = modal.querySelector('input, select, textarea, button');
    if (first) first.focus();
  };

  const closeModal = () => {
    modal.classList.remove('ativo');
    modal.style.display = 'none';
    modal.setAttribute('aria-hidden', 'true');
  };

  btnNovo.addEventListener('click', openModal);
  btnFechar.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('ativo')) {
      closeModal();
    }
  });
});
