const block = document.getElementById('nav');

window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
        block.classList.add('visible');
    } else {
        block.classList.remove('visible');
    }
});