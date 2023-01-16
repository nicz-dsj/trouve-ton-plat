const body = document.getElementsByTagName('body')[0];
const eventslist = document.getElementById("autre_events");

for(let i = 0; i < eventslist.querySelectorAll('.event').length; i++){
    eventslist.querySelectorAll('.event')[i].addEventListener('click', function(){
        window.location.href = `index.php?page=evenements&id=${eventslist.querySelectorAll('.event')[i].id}`;
    });
}