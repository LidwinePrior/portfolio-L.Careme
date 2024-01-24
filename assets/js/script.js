function toggleMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = (mobileNav.style.display === 'flex') ? 'none' : 'flex';
}


function closeMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = 'none';
}







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

