// navbar.js — toggle mobile menu
document.addEventListener('DOMContentLoaded', () => {
    const toggler = document.getElementById('navToggler');
    const menu    = document.getElementById('navMenu');

    if (!toggler || !menu) return;

    toggler.addEventListener('click', () => {
        const expanded = toggler.getAttribute('aria-expanded') === 'true';
        toggler.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('is-open', !expanded);
    });

    // Cierra el menú si se hace click fuera
    document.addEventListener('click', (e) => {
        if (!toggler.contains(e.target) && !menu.contains(e.target)) {
            toggler.setAttribute('aria-expanded', 'false');
            menu.classList.remove('is-open');
        }
    });
});

