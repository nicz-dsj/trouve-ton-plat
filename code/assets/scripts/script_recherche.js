var recherche = document.getElementsByName("frecherche")[0];
var button = document.getElementsByTagName("button")[0];


var test = ["Quiche","Gateau","Cookie"];

//Quand la touche entrée est pressée, on ajoute le texte de la recherche dans une liste

const opts = document.getElementById('platsLi').childNodes;
console.log(opts);
const dinput = document.getElementById('inpPlats');
const listIngr = [];
let eventSource = null;
let valeur = '';

dinput.addEventListener('keydown', (e) => {
   eventSource = e.key ? 'input' : 'list';
   valeur = (dinput.value);
      if (e.key === 'Enter') {
         for(let i = 1; i <= opts.length; i++) {
            if (opts[i*2-1].value === valeur) {
               alert('WROTE! ' + valeur);

               if(listIngr.includes(valeur) === false) {
                  listIngr.push(valeur);
                  update(i);
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
      for(let i = 1; i <= opts.length; i++) {
         if (opts[i*2-1].value === valeur) {
            update(i);
         };
      };
      console.log(listIngr);
   };
  }
});

function update(j){
   let plats = document.getElementsByClassName("container_plat");
   
   for(let i = 0; i <= plats.length; i++){
      if(!(plats[i].dataset.ing.includes(j))){
         plats[i].style.display="none";
      }
   };
}
