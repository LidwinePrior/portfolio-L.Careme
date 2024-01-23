function toggleMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = (mobileNav.style.display === 'flex') ? 'none' : 'flex';
}


function closeMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = 'none';
}