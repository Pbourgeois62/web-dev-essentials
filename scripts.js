const toggleButton = document.getElementById('dark-mod-toggle');
const body = document.body;

toggleButton.addEventListener('click',() => {
    body.classList.toggle('darkmod');
})

function showMessage() {
    alert("Bonjour, tu as cliqué sur le bouton !");
}