var logo = document.querySelector('.container_header');
var menu = document.querySelector('.menu');

console.log('coucou');

logo.addEventListener('click',function(){
    menu.classList.toggle('showmenu');
});