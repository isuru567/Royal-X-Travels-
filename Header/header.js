document.addEventListener('DOMContentLoaded', function () {
    const currentPath = window.location.pathname;

    const navLinks = document.querySelectorAll('.header--nav--link');

    navLinks.forEach(link => {
    
        const linkPath = link.getAttribute('href');

    
    
        if (currentPath.includes(linkPath.replace('../', ''))) {
            link.classList.add('active');
        }
    });

    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.header--list1');

    hamburger.addEventListener('click', function () {
        this.classList.toggle('active');
        navMenu.classList.toggle('show');
    });

    document.querySelectorAll('.header--nav--link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('show');
        });
    });
});