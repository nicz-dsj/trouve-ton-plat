//Quand la touche entrée est pressée, on ajoute le texte de la recherche dans une liste

document.getElementById('inpPlats').addEventListener('keypress', (e) => {
   const key = e.key;
   if (key === "Enter") {
      var text = document.getElementById("inpPlats").value;
      var liste = document.getElementById("platsLi");
      console.log(text);
   }
});