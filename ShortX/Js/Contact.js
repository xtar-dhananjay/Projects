// this is for Show active Page
let CourseTab = document.querySelectorAll('#ManuBar li');
CourseTab[0].classList.remove('ActivePage');
CourseTab[2].classList.add('ActivePage');

let SandBtn = document.getElementById('SandBtn');
let UName = document.getElementById('UName');
let UPhone = document.getElementById('UPhone');
let UMessage = document.getElementById('UMessage');

SandBtn.onclick = (e) => {
    
    if (UName.value === '') {
        UName.style.borderColor = 'red';
        e.preventDefault();
    }else{
        UName.style.borderColor = '#ffffff';
    }
    
    // Phone Number
    let Phoneno = /^\d{10}$/;
    if (UPhone.value.match(Phoneno)) {
        UPhone.style.borderColor = "#ffffff";
    }else{
        UPhone.style.borderColor = "red";
        e.preventDefault();
        
    }
    
    if (UMessage.value === '') {
        UMessage.style.borderColor = 'red';
        e.preventDefault();
    }else{
        UMessage.style.borderColor = '#ffffff';
    }
    
}

// Name
UName.onkeyup = () => {
    if (UName.value.length >= 3) {
        UName.style.borderColor = "#ffffff";
    }
}

// Phone Number
UPhone.onkeyup = () => {
    let Phoneno = /^\d{10}$/;
    if (UPhone.value.match(Phoneno)) {
        UPhone.style.borderColor = "#ffffff";
    }
}

// Message
UMessage.onkeyup = () => {
    if (UMessage.value.length >= 2) {
        UMessage.style.borderColor = "#ffffff";
    }
}