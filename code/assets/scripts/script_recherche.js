//Quand la touche entrée est pressée, on ajoute le texte de la recherche dans une liste

const opts = document.getElementById('platsLi').childNodes;
const dinput = document.getElementById('inpPlats');
const listIngr = [];
let eventSource = null;
let valeur = '';

dinput.addEventListener('keydown', (e) => {
   eventSource = e.key ? 'input' : 'list';
   valeur = (dinput.value);
      if (e.key === 'Enter') {
         for(let i = 1; i <= opts.length; i+=2) {
            if (opts[i].value === valeur) {
               alert('WROTE! ' + valeur);

               if(listIngr.includes(valeur) === false) {
                  listIngr.push(valeur);
                  update();
                  console.log(listIngr);
               };
               dinput.value = '';
               eventSource = null;
               valeur = '';
               i=opts.length;
            };
         };
      };
});
dinput.addEventListener('input', (e) => {
   valeur = e.target.value;
  if (eventSource === 'list') {
    alert('CLICKED! ' + valeur);
    
    if(listIngr.includes(valeur) === false) {
      listIngr.push(valeur);
      update();
      console.log(listIngr);
   };
  }
});

function update(){
   for(let j = 1; j <= listIngr.length; j++){
      console.log("oui");
   }
}