var recherche = document.getElementsByName("frecherche")[0];
var button = document.getElementsByTagName("button")[0];


var test = ["Quiche","Gateau","Cookie"];

const opts = document.getElementById('platsLi').childNodes;
const dinput = document.getElementById('inpPlats');
let listIngr = [];
let listIngrNum = [];
let eventSource = null;
let valeur = '';

dinput.addEventListener('keydown', (e) => {
   eventSource = e.key ? 'input' : 'list';
   valeur = (dinput.value);

      if (e.key === 'Enter') {

         if(listIngr.includes(valeur) === false) {
            listIngr.push(valeur);

         for(let i = 1; i < opts.length/2; i++) {
            if (opts[i*2-1].value === valeur) {

                  listIngrNum.push(i);

                  var element = document.createElement("div");
                  element.classList.add("tagsIn")
                  element.innerHTML = valeur;
                  document.getElementsByClassName("container_scroll")[0].style.height = "61vh";


                  element.addEventListener('click', (e) => {

                     let listTemp =  [];
                     let listTempNum =  [];
            
                     for (let j = 0; j < listIngr.length; j++) {
                        if (listIngr[j] !== element.innerHTML) {
                           listTemp.push(listIngr[j]);
                        }
                        if (listIngrNum[j] != i)
                           listTempNum.push(listIngrNum[j]);
                     }
            
                     listIngr = listTemp;
                     listIngrNum = listTempNum

                     element.parentNode.removeChild(element);

                     updateDel(i);
                  });


                  document.getElementById("tagsD").appendChild(element);
                  update(i);
               };

            };
         };
      };
});
dinput.addEventListener('input', (e) => {
   valeur = e.target.value;
  if (eventSource === 'list') {
    
    if(listIngr.includes(valeur) === false) {
      listIngr.push(valeur);

      for(let i = 1; i < opts.length/2; i++) {
         if (opts[i*2-1].value === valeur) {

            console.log(valeur);
            console.log(i);
            
            listIngrNum.push(i);

            var element = document.createElement("div");
            element.classList.add("tagsIn")
            element.innerHTML = valeur;
            document.getElementsByClassName("container_scroll")[0].style.height = "61vh";
   
            element.addEventListener('click', (e) => {

               let listTemp =  [];
               let listTempNum =  [];
      
               for (let j = 0; j < listIngr.length; j++) {
                  if (listIngr[j] !== element.innerHTML) {
                     listTemp.push(listIngr[j]);
                  }
                  if (listIngrNum[j] != i)
                     listTempNum.push(listIngrNum[j]);
               }

               listIngr = listTemp;
               listIngrNum = listTempNum
      
               element.parentNode.removeChild(element);
      
               updateDel(i);
            });


            document.getElementById("tagsD").appendChild(element);
            update(i);
         };
      };
   };
  }
});

function update(j){
   let plats = document.getElementsByClassName("container_plat");
   
   for(let i = 0; i < plats.length; i++){
      if(j.toString().length == 1){
         if(!(plats[i].dataset.ing.includes("-"+j+"-")) && !(plats[i].dataset.ing[0] == j)){
            plats[i].style.display="none";
         }
      }
      else {
         var temp = "";
         for(let k = 0; k < j.toString().length; k++){
            var temp = temp + plats[i].dataset.ing[k];
         }
         if(!(plats[i].dataset.ing.includes("-"+j+"-")) && !(temp == j)){
            plats[i].style.display="none";
         }
      }
   };


   dinput.value = '';
   eventSource = null;
   valeur = '';

}

function updateDel(j){
   let plats = document.getElementsByClassName("container_plat");
   for(let i = 0; i < plats.length; i++){
      if(j.toString().length == 1){
         if(!(plats[i].dataset.ing.includes("-"+j+"-")) && !(plats[i].dataset.ing[0] == j)){
            plats[i].style.display="";
         }
      }
      else {
         var temp = "";
         for(let k = 0; k < j.toString().length; k++){
            var temp = temp + plats[i].dataset.ing[k];
         }
         if(!(plats[i].dataset.ing.includes("-"+j+"-")) && !(temp == j)){
            plats[i].style.display="";
         }
      }
   };
   for(let k= 0; k < listIngrNum.length; k++){
      console.log(listIngrNum[0]);
      update(listIngrNum[k]);
   };

}
