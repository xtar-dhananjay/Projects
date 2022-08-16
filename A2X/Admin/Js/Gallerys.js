const CurentPage = document.querySelectorAll('#SideBar ul li a');
CurentPage[4].classList.add('Active');

// Start Building Form
const AddGalleryBtn = document.getElementById('AddCategory-BTN');
const AddImgPage = document.getElementById('AddImg-Page');
const AddImgCacnel = document.getElementById('AddImg-Cancel');
const UpImgPage = document.getElementById('UpImg-Page');
const UpImgCancel = document.getElementById('UpImg-Cancel');
const UpimgBtn = document.querySelectorAll('.PhotoUD-Btn');
AddGalleryBtn.onclick = () => {
    console.log('hell');
    AddImgPage.classList.add('Active');
}

AddImgCacnel.onclick = () => {
    AddImgPage.classList.remove('Active');
    
}


UpimgBtn.forEach(element => {
    element.onclick = () => {
        UpImgPage.classList.add('Active');   
    }
});

UpImgCancel.onclick = () => {
    UpImgPage.classList.remove('Active');   
}