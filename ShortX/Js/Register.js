// This is for Show and Hide password using the eye icon
function ShowHide(InputID, EyeID){
    let PassInput = document.getElementById(InputID);
    let EyeIcon = document.getElementById(EyeID);

    if (PassInput.type == "password") {
        PassInput.type = "text";
    }else{
        PassInput.type = "password";
    }
    if (EyeIcon.textContent == "visibility_off") {
        EyeIcon.textContent = "visibility";
        
    }else{
        EyeIcon.textContent = "visibility_off";
    }
}

// This is for Form Validation
let Name = document.getElementById('Name');
let Username = document.getElementById('Username');
let PhoneNumber = document.getElementById('PhoneNumber');
let Email = document.getElementById('Email');
let Qualification = document.getElementById('Qualification');
let State = document.getElementById('State');
let Gender = document.getElementById('Gender');
let Birth = document.getElementById('Birth');
let FirstPassword = document.getElementById('FirstPassword');
let SecondPassword = document.getElementById('SecondPassword');
let Submit = document.getElementById('Submit');
let File = document.getElementById('UserImg');
let UploadImg = document.querySelector('#Upload-Photo img');
let UploadIcon = document.querySelector('#Upload-Photo div');
let UploadBox = document.querySelector('#Upload-Photo');


if (UploadImg.src !== '') {
    UploadImg.style.display = 'block';
}

function TodayYear(){
    // Birth
    let NowDate = new Date();
    return NowDate.getFullYear();
}

function BirthYear(){
    let DOB = Birth.value.split('-');
    return parseInt(DOB[0]);
}


Submit.onclick = (e) => {
    function UnSubmit(){
        return e.preventDefault();
    }

    // Name
    if (Name.value.length < 3) {
        Name.style.borderColor = "red";
        UnSubmit();
    }else{
        Name.style.borderColor = "#ffffff";
        
    }
    
    // Username
    if (Username.value.length < 3) {
        Username.style.borderColor = "red";
        UnSubmit();
    }else{
        Username.style.borderColor = "#ffffff";
        
    }
    
    // Phone Number
    let Phoneno = /^\d{10}$/;
    if (PhoneNumber.value.match(Phoneno)) {
        PhoneNumber.style.borderColor = "#ffffff";
    }else{
        PhoneNumber.style.borderColor = "red";
        UnSubmit();
        
    }

    // Email
    let Mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(Email.value.match(Mailformat)){
        Email.style.borderColor = "#ffffff";
    }else{
        Email.style.borderColor = "red";
        UnSubmit();

    }

    // Qualification
    if (Qualification.value == 'Select Qualification') {
        Qualification.style.borderColor = "red";
        UnSubmit();
    }else{
        Qualification.style.borderColor = "#ffffff";
        
    }
    // State
    if (State.value == 'Select State') {
        State.style.borderColor = "red";
        UnSubmit();
    }else{
        State.style.borderColor = "#ffffff";
        
    }
    // Gender
    if (Gender.value == 'Select Gender') {
        Gender.style.borderColor = "red";
        UnSubmit();
    }else{
        Gender.style.borderColor = "#ffffff";
        
    }
    
    // Birth
    let TodaysYear = TodayYear();
    let BearthYear = BirthYear();
    if (BearthYear > (TodaysYear - 5) || Birth.value == '') {
        Birth.style.borderColor = "red";
        UnSubmit();
    }else{
        Birth.style.borderColor = "#ffffff";
    }

    if ((FirstPassword.value === SecondPassword.value) && (FirstPassword.value !== "") && (SecondPassword.value !== "")) {
        FirstPassword.style.borderColor="#ffffff";
        SecondPassword.style.borderColor="#ffffff";
    }else{
        FirstPassword.style.borderColor="red";
        SecondPassword.style.borderColor="red";
        UnSubmit();
        
    }
    
    if (File.files[0] === undefined && UploadImg.src == '') {
        UnSubmit();
        UploadBox.style.border="1px solid red";
        console.log('red');
    }else{
        UploadBox.style.border="none";
        console.log('white');
    }

}


// Name
Name.onkeyup = () => {
    if (Name.value.length >= 3) {
        Name.style.borderColor = "#ffffff";
    }
}

// Username
Username.onkeyup = () => {
    if (Username.value.length >= 3) {
        Username.style.borderColor = "#ffffff";
    }
}

// Phone Number
PhoneNumber.onkeyup = () => {
    let Phoneno = /^\d{10}$/;
    if (PhoneNumber.value.match(Phoneno)) {
        PhoneNumber.style.borderColor = "#ffffff";
    }
}

// Email
Email.onkeyup = () => { 
    let Mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(Email.value.match(Mailformat)){
        Email.style.borderColor = "#ffffff";
    }
}

// Qualification
Qualification.onchange = () => {
    if (Qualification.value !== 'Select Qualification') {
        Qualification.style.borderColor = "#ffffff";
    }else{
        
    }
}

// State
State.onchange = () => {
    if (State.value !== 'Select State') {
        State.style.borderColor = "#ffffff";
    }
}

// Gender
Gender.onchange = () => {
    if (Gender.value !== 'Select Gender') {
        Gender.style.borderColor = "#ffffff";
    }
}

// Birth
Birth.onchange = () => {    
    let TodaysYear = TodayYear();
    let BearthYear = BirthYear();
    if ((TodaysYear - 4) > BearthYear) {
        Birth.style.borderColor = "#ffffff";
        console.log('Yes');
    }
    console.log(BearthYear);
    console.log('NO');
}


// This is for live preview of user photo
File.onchange = () => {
    if (File.files[0] != '') {
        UploadBox.style.border="none";
        UploadImg.src = URL.createObjectURL(File.files[0]);
        UploadIcon.style.display = "none";
        UploadImg.style.display = 'block';
        
    }
};