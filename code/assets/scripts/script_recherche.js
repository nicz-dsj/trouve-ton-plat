var plats = [];
var list = document.getElementById('platsLi');

plats.forEach(function(item){
   var option = document.createElement('option');
   option.value = item;
   list.appendChild(option);
});