// this is for Show active Page
let UserProfileTab = document.querySelector('#ManuBar img'); 
let CourseTab = document.querySelectorAll('#ManuBar li');
CourseTab[0].classList.remove('ActivePage');
UserProfileTab.style.border = '2px solid var(--First-Color)';