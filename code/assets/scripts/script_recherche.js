//Quand la touche entrée est pressée, on ajoute le texte de la recherche dans une liste

const opts = document.getElementById('platsLi').childNodes;
const dinput = document.getElementById('inpPlats');
let eventSource = null;
let value = '';

dinput.addEventListener('keydown', (e) => {
  eventSource = e.key ? 'input' : 'list';
});
dinput.addEventListener('input', (e) => {
  value = e.target.value;
  if (eventSource === 'list') {
    alert('CLICKED! ' + value);
  }
});