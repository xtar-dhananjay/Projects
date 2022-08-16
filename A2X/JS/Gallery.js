// This is for Showing Border Bottom Below Current Pages
const Pages = document.querySelectorAll('.menu-list li a');
Pages.forEach(element => {
    element.classList.remove('active');
});
Pages[2].classList.add('active');