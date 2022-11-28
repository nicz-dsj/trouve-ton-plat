var logo = document.querySelector('.container_header');
var menu = document.querySelector('.menu');

logo.addEventListener('click',function(){
    menu.classList.toggle('showmenu');
});