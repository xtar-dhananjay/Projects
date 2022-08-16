// this is for Show active Page
let CourseTab = document.querySelectorAll('#ManuBar li');
CourseTab[0].classList.remove('ActivePage');
CourseTab[1].classList.add('ActivePage');

// This is for responsive navbar with fix the search Bar bug or error
let MenuBtn1 = document.getElementById('MenuBtn');
let MenuBar1 = document.getElementById('ManuBar');
let SearchBox = document.getElementById('Search-Box');
MenuBtn1.onclick = () => {
    MenuBar1.classList.toggle('ActiveBar');
    SearchBox.classList.toggle('Active-SearchBox');
}