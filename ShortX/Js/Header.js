// Start making show and hide MenuBar
let MenuBtn = document.getElementById('MenuBtn');
let MenuBar = document.getElementById('ManuBar');

MenuBtn.onclick = () => {
    MenuBar.classList.toggle('ActiveBar');
}