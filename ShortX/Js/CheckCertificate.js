// this is for Show active Page
let UserProfileTab = document.querySelector('#ManuBar img'); 
let CourseTab = document.querySelectorAll('#ManuBar li');
CourseTab[0].classList.remove('ActivePage');

// Start Show Certificate With Valid Certificate ID
let CertificateID = document.getElementById('CertificateID');
let CheckBtn = document.getElementById('CheckBtn');
let SuccessMsg = document.getElementById('CheckCertificate-2');
let ErrorMsg = document.getElementById('CheckCertificate-3');

CheckBtn.onclick = () => {

    let ValidID = '23102003';

    // Phone Number
    if (CertificateID.value.length >= 1) {
        CertificateID.style.borderColor = "var(--First-Color)";

        if (CertificateID.value == ValidID) {
            ErrorMsg.style.display = 'none'
            SuccessMsg.style.display = 'block';
            console.log('Valid');
        }else{
            SuccessMsg.style.display = 'none';
            ErrorMsg.style.display = 'block'
            CertificateID.style.borderColor = "red";
            console.log('InValid');
        }
        
    }else{
        CertificateID.style.borderColor = "red";
    }


    
    console.log('This is working now');


}

