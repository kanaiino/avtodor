document.addEventListener('DOMContentLoaded', () => {
  const burger = document.querySelector('.burger');
  const rside = document.querySelector('.rside');

  burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    rside.classList.toggle('active');
    document.body.classList.toggle('menu-open');
  });
});