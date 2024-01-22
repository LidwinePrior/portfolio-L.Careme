function toggleMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = (mobileNav.style.display === 'flex') ? 'none' : 'flex';
}

function closeMobileMenu() {
    var mobileNav = document.querySelector('.mobile-nav');
    mobileNav.style.display = 'none';
}
