const CurentPage = document.querySelectorAll('#SideBar ul li a');
CurentPage[5].classList.add('Active');

const ErrorMessage = document.getElementById('Error-Message');
const SuccessMessage = document.getElementById('Success-Message');
const AddCancelBtn = document.getElementById('AddUser-Cancel');
const AddUserPage = document.getElementById('AddUser-Page');
const AddUsersBtn = document.getElementById('AddUsers-Btn');
const UpUserPage = document.getElementById('UpdateUser-Page');
const Tbody = document.getElementById('UserList'); 

// Start AJX Part
const InsertForm = document.getElementById('InsertForm');
const SaveBtn = document.getElementById('SaveBtn');
const File1 = document.getElementById('File1');
const ImgInsert = document.getElementById('ImgInsert');
const UName = document.getElementById('1Name');
const UUsername = document.getElementById('1Username');
const UPassword = document.getElementById('AddPassword');
const URole = document.getElementById('URole');
// Ajax

function ShowPassword(ID1, ID2){
    let PassInput = document.getElementById(ID1);
    let EyeIcon = document.getElementById(ID2);
    if (PassInput.type == 'text') {
        PassInput.type = 'password'; 
    }else{
        PassInput.type = 'Text';
    }
    if (EyeIcon.classList.contains('fa-eye-slash')) {
        EyeIcon.classList.replace('fa-eye-slash', 'fa-eye')   
    }else{
        EyeIcon.classList.replace('fa-eye', 'fa-eye-slash')   

    }
}

AddUsersBtn.onclick = () => {
    AddUserPage.classList.add('Active');

}

AddCancelBtn.onclick = () => {
    AddUserPage.classList.remove('Active');
    FormReset();
}

// Start AJX Part

// Let's Load the user list table
function LoadTable(){
    fetch('PHP/Users/ShowUsers.php')
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            Tbody.innerHTML = `<tr>
            <td colspan="6" align="center"><h2>Record Not Found</h2>
            </td></tr>`;
        }else{
            let Tr = '';
            for (let i = 0; i < Data.length; i++){
                Tr +=`<tr>
                        <td>${i+1}</td>
                        <td>${Data[i].Name}</td>
                        <td>${Data[i].Username}</td>
                        <td>${Data[i].Role}</td>
                        <td><i data-Edit='${Data[i].ID}' class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i data-Delete='${Data[i].ID}' class="fa-solid fa-trash Trash"></i></td>
                    </tr>`;
            }

            Tbody.innerHTML = Tr;
        }
        
    })
}
LoadTable();


// This is for Add User AJX
File1.onchange = () => {
    ImgInsert.innerHTML = `<img src="${URL.createObjectURL(File1.files[0])}" alt="User Photo">`;
}

SaveBtn.onclick = (e) => {
    e.preventDefault();
    if ((UName.value !== '') && (UPassword.value !== '') && (URole.value !== '') && (UUsername.value !== '') && (File1.value !== '')) {
        let FData = new FormData(InsertForm);
        fetch('PHP/Users/UsersInsert.php',{
            method: 'POST',
            body: FData
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data.Status == 'Success') {
                ShowMessage(SuccessMessage, 'User Created Successfully');
                AddCancelBtn.onclick();
                LoadTable();

            }else if(Data.Status == 'Extanstion Problem'){
                ShowMessage(ErrorMessage, 'Please Choose The Image');

            }else if(Data.Status == 'Username Problem'){
                ShowMessage(ErrorMessage, 'Please choose the different username');

            }else{
                ShowMessage(ErrorMessage, 'Please Try Again');
            }

        })
        .catch()
    }else{
        ShowMessage(ErrorMessage, 'All Feilds Are Required');
    }
}

function FormReset(){
    ImgInsert.innerHTML = '<i class="fa-solid fa-upload"></i>';
    InsertForm.reset();
}

function ShowMessage(Message, Text){
    Message.classList.add('Active');
    TextValue = Message.querySelector('p').innerText = Text;
    setTimeout(() => {
        Message.classList.remove('Active');
    }, 3000);
}

console.log('hello');




// This is for User Old Data Get For Update
$(document).on('click', '.Edit', function(){
    UpUserPage.classList.add('Active');
    var EditID = $(this).attr("data-edit");
    fetch('PHP/Users/HistoryData.php?EditID='+EditID)
    .then((Response) => Response.json())
    .then((Data) => {          
        $('#HName').val(Data[0].Name);        
        $('#HUserName').val(Data[0].Username);        
        $('#Hhidden1').val(Data[0].Img);        
        $('#Hhidden2').val(Data[0].ID);
        if (Data[0].Role == 'Normal User') {
            $('#HSelect').html(
                "<option selected>Normal User</option><option>Admin</option>"
            );        
        }else{
            $('#HSelect').html(
                "<option>Normal User</option><option selected>Admin</option>"
            );
        }
        $('#UImgSrc').attr('src', `../Img/${Data[0].Img}`);
            
    })
})


$('#UpUser-Cancel').click(function(){
    UpUserPage.classList.remove('Active');

})


// this is for update users
const File2 = document.getElementById('File2');
const UImgSrc = document.getElementById('UImgSrc');
File2.onchange = () => {
    UImgSrc.src = URL.createObjectURL(File2.files[0]);
};

$('#UpdateBtn').click(function(e){    
    e.preventDefault();
    if (($('#HName').val() !== '') && ($('#HUserName').val() !== '') && ($('#Role').val() !== '')) {
        let UpForm = document.getElementById('UForm');
        let UpData = new FormData(UpForm);
        console.log(UpData);
        fetch('PHP/Users/Update.php',{
            method: 'POST',
            body: UpData
        })
        .then((Response) => Response.json())
        .then((Data) => {
            console.log(Data);
            if (Data.Status == 'Updated') {
                ShowMessage(SuccessMessage, 'User Updated Successfully');
                $('#UpUser-Cancel').click();
                LoadTable();

            }else if(Data.Status == 'Extanstion Problem'){
                ShowMessage(ErrorMessage, 'Please Choose The Image');
            }else{
                ShowMessage(ErrorMessage, 'Please Try Again');
            }

        })
        .catch()
    }else{
        ShowMessage(ErrorMessage, 'All Feilds Are Required');
    }

});


// Delete Users
$(document).on('click', '.Trash', function(){

    var DeleteID = $(this).attr("data-delete");
    console.log(DeleteID);
    fetch('PHP/Users/DeleteUser.php?DelteID='+ DeleteID)
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data);
        if (Data.Status == 'Deleted') {
            ShowMessage(SuccessMessage, 'User Deleted Successfully');
            $(this).closest('tr').fadeOut();

        }else{
            ShowMessage(ErrorMessage, 'Please Try Again');
        }

    })
    .catch()

});