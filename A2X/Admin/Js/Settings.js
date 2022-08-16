const CurentPage = document.querySelectorAll('#SideBar ul li a');
CurentPage[7].classList.add('Active');

const ContCloseBtn = document.getElementById('Cont-Close');
const ContactCont = document.getElementById('Contact-Cont');
const ContUpdateBtn = document.getElementById('ContUpdateBtn');
const SlidesCont = document.getElementById('Slides-Cont');
const SlidesUpdateBtn = document.getElementById('SlidesUpdateBtn');
const SlideCloseBtn = document.getElementById('Slide-Close');
const HomeCont = document.getElementById('Home-Cont');
const HomeCloseBtn = document.getElementById('Home-Close');
const HomeUdateBtn = document.getElementById('HomeUdateBtn');
const AboutCloseBtn = document.getElementById('About-Close');
const AboutUdateBtn = document.getElementById('AboutUdateBtn');
const AboutCont = document.getElementById('About-Cont');
const ErrorMessage = document.getElementById('Error-Message');
const SuccessMessage = document.getElementById('Success-Message');


// Contact
ContCloseBtn.onclick = () => {
    ContactCont.classList.remove('Active');
}

// Slide
SlidesUpdateBtn.onclick = () => {
    SlidesCont.classList.add('Active');
}

SlideCloseBtn.onclick = () => {
    SlidesCont.classList.remove('Active');
}

// Home
HomeUdateBtn.onclick = () => {
    HomeCont.classList.add('Active');
}

HomeCloseBtn.onclick = () => {
    HomeCont.classList.remove('Active');
}

// About
AboutUdateBtn.onclick = () => {
    AboutCont.classList.add('Active');
}

AboutCloseBtn.onclick = () => {
    AboutCont.classList.remove('Active');
}


// This is for Alert message Show
function ShowMessage(Message, Text){
    Message.classList.add('Active');
    TextValue = Message.querySelector('p').innerText = Text;
    setTimeout(() => {
        Message.classList.remove('Active');
    }, 3000);
}

// Start Ajax Work
let ContUpdateButton = document.getElementById('ContUpdateButton');
let ContFalid = true;
function ValidateNumber(ID){
    let ValidedateNumber = document.getElementById(ID);
    let RegExp = /^[0-9]{10}$/;
    if (RegExp.test(ValidedateNumber.value)) {
        ContFalid = true;
    }else{
        ContFalid = false;
        ShowMessage(ErrorMessage, 'Please Enter Valid Phone Number');

    }
}    



ContUpdateButton.onclick = () => {
    if (ContFalid = true) {
        let ContactForm = document.getElementById('ContForm');
        let ContUpData = new FormData(ContactForm);
    
        fetch('PHP/Settings/Update.php',{
            method: 'POST',
            body: ContUpData
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data['Status'] == 'Success') {
                ShowMessage(SuccessMessage, 'Contact Details is Updated');
                ContactCont.classList.remove('Active');
            }else{            
                ShowMessage(ErrorMessage, 'Not Updated Contact-Info');
                ContactCont.classList.remove('Active');
            }
        })
    }
}


ContUpdateBtn.onclick = () => {
    // This is for Showing the contact-update Form
    ContactCont.classList.add('Active');
    fetch('PHP/Settings/ShowHistory.php')
    .then((Response) => Response.json())
    .then((Data) => {
        // Asign all Data on Contact form
        $('#CallNumber1').val(Data[0].Whats);
        $('#CallNumber2').val(Data[0].Phone);
        $('#CallNumber3').val(Data[0].Number1);
        $('#CallNumber4').val(Data[0].Number2);
        $('#Facebook').val(Data[0].Face);
        $('#Instagram').val(Data[0].Insta);
        $('#linkedin').val(Data[0].Linke);
        $('#Twitter').val(Data[0].Twitter);
        $('#Email').val(Data[0].Email);
        $('#WorkingTime').val(Data[0].WorkingTime);
        $('#Address').val(Data[0].Address);
    })
}

// Start Home About Section
let File1 = document.getElementById('HomeFile1');
File1.onchange = () => {
    $('#ShowAboutImg1').attr("src", URL.createObjectURL(File1.files[0]));
}

let File2 = document.getElementById('HomeFile2');
File2.onchange = () => {
        $('#ShowAboutImg2').attr("src", URL.createObjectURL(File2.files[0]))
}

// Get History Data about the home about section
$('#HomeUdateBtn').click(function(){

    fetch('PHP/Settings/GetOldImg.php')
    .then((Response) => Response.json())
    .then((Data) => {
        $('#OldFile1').val(Data[0].AboutImg1);
        $('#OldFile2').val(Data[0].AboutImg2);
        $('#About1').val(Data[0].About1);
        $('#About2').val(Data[0].About2);
        $('#ShowAboutImg1').attr("src", '../Img/' + Data[0].AboutImg1)
        $('#ShowAboutImg2').attr("src", '../Img/' + Data[0].AboutImg2)
    })
});

// Update Home About Section
$('#HA-Up-Btn').click(function(){
    const HomeUpForm = document.getElementById('HomeUpForm');
    let HomeData = new FormData(HomeUpForm);

    fetch('PHP/Settings/HomeAbout.php',{
        method: 'POST',
        body: HomeData
    })
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data);
        if (Data['Status'] == 'Updated') {
            ShowMessage(SuccessMessage, 'Updated Successfully');
            ContactCont.classList.remove('Active');
        }else{            
            ShowMessage(ErrorMessage, 'Not Updated Try Again');
            ContactCont.classList.remove('Active');
        }
        HomeCont.classList.remove('Active');
    })
});



// Start About Page

// Get Data About Page History
$('#AboutUdateBtn').click(function(){

    fetch('PHP/Settings/AboutHistory.php')
    .then((Response) => Response.json())
    .then((Data) => {
        $('#TextAreaAbout1').val(Data[0].About1);
        $('#About1Img').attr("src", '../Img/' + Data[0].AboutImg1)

        $('#TextAreaAbout2').val(Data[0].About2);
        $('#About2Img').attr("src", '../Img/' + Data[0].AboutImg2)

        $('#WK1').val(Data[0].WK1);
        $('#WKImg1').attr("src", '../Img/' + Data[0].WKImg1)

        $('#WK2').val(Data[0].WK2);
        $('#WKImg2').attr("src", '../Img/' + Data[0].WKImg2)

        $('#WK3').val(Data[0].WK3);
        $('#WKImg3').attr("src", '../Img/' + Data[0].WKImg3)
        
        $('#WK4').val(Data[0].WK4);
        $('#WKImg4').attr("src", '../Img/' + Data[0].WKImg4)

        $('#WK5').val(Data[0].WK5);
        $('#WKImg5').attr("src", '../Img/' + Data[0].WKImg5)

        $('#WK6').val(Data[0].WK6);
        $('#WKImg6').attr("src", '../Img/' + Data[0].WKImg6)

        $('#OldImgA1').val(Data[0].AboutImg1);
        $('#OldImgA2').val(Data[0].AboutImg2);
        $('#OldImgW1').val(Data[0].WKImg1);
        $('#OldImgW2').val(Data[0].WKImg2);
        $('#OldImgW3').val(Data[0].WKImg3);
        $('#OldImgW4').val(Data[0].WKImg4);
        $('#OldImgW5').val(Data[0].WKImg5);
        $('#OldImgW6').val(Data[0].WKImg6);

    })
});


// Update The About Page
$('#AboutUpdateBtn').click(function(){
    const AboutFData = document.getElementById('AboutUpdateForm'); 
    let AFData = new FormData(AboutFData);

    fetch('PHP/Settings/UpdateAbout.php',{
        method: 'POST',
        body: AFData
    })
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data);
    })




});