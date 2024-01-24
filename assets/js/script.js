//fonctin pour display le menu déroulant
function toggleMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = (mobileNav.style.display === 'flex') ? 'none' : 'flex';
}

//fonction pour fermer le menu quand on clique ailleurs
function closeMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = 'none';
}






// ajout d'une class pour ajouter ces elements après un certain temps
document.addEventListener('DOMContentLoaded', function () {
    // Ajoutez la classe "show" après un certain délai (par exemple, 500 millisecondes)
    setTimeout(function () {
        document.querySelector('h1').classList.add('show');
        document.querySelector('h2').classList.add('show');
        document.querySelectorAll('h3').forEach(function (element) {
            element.classList.add('show');
        });   
    }, 500);
});

