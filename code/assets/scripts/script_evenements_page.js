// Liste des évènements en cours
const eventslist = document.getElementById("autre_events");

// Redirection vers les autres évènements en cours
for(let i = 0; i < eventslist.querySelectorAll('.event').length; i++){
    eventslist.querySelectorAll('.event')[i].addEventListener('click', function(){
        window.location.href = `index.php?page=evenements&id=${eventslist.querySelectorAll('.event')[i].id}`;
    });
}