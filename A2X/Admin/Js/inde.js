const EyeIcon = document.getElementById('EyeIcon');
const PassInput = document.getElementById('Password');
const ErrorMessage = document.getElementById('Error-Message');
const SuccessMessage = document.getElementById('Success-Message');

EyeIcon.onclick = () => {
    if (EyeIcon.classList.contains('fa-eye')) {
        PassInput.type = 'text';
        EyeIcon.style.color = '#333';
        EyeIcon.classList.replace('fa-eye','fa-eye-slash');
    }else{
        PassInput.type = 'password';
        EyeIcon.style.color = 'lightgray';
        EyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Start Ajax Part for login system
$('#LoginBtn').click(function(e){
    e.preventDefault();

    
    if (($('#Username').val() !== '') && ($('#Password').val() !== '') ) {

        let Form = document.getElementById('LoginForm');
        let Data = new FormData(Form);
    
        fetch('PHP/Index/index.php',{
            method: 'POST',
            body: Data
        })
        .then((Response) => Response.json())
        .then((Data) => {
            console.log(Data);
            if (Data.Status == 'Loagin Successfully') {
                location = 'Dashboard.php';
    
            }else if(Data.Status == 'vaild details'){
                ShowMessage(ErrorMessage, 'vaild details');
            }
    
        })
        .catch()
    
    }else{
        ShowMessage(ErrorMessage, 'All Fields Are Required');
    }

});

function ShowMessage(Message, Text){
    Message.classList.add('Active');
    TextValue = Message.querySelector('p').innerText = Text;
    setTimeout(() => {
        Message.classList.remove('Active');
    }, 3000);
}