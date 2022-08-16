const CurentPage = document.querySelectorAll('#SideBar ul li a');
let AddForm = document.getElementById('AddForm');
let UpForm = document.getElementById('UpdateForm');
const ErrorMessage = document.getElementById('Error-Message');
const SuccessMessage = document.getElementById('Success-Message');
const Tbody = document.getElementById('Tbody');
const AddCategoryPage = document.getElementById('AddCategory');
const AddCategoryBTN = document.getElementById('AddCategory-BTN');
const AddCancelBtn = document.getElementById('Cancel-Btn');
const UpCancelBtn = document.getElementById('UpCancel-Btn');
const EditBtn = document.querySelectorAll('#Category-body table td i.Edit');
const UpdateCategory = document.getElementById('UpdateCategory');
CurentPage[3].classList.add('Active');

AddCategoryBTN.onclick = () => {
    AddCategoryPage.classList.add('Active');
}

AddCancelBtn.onclick = () => {
    AddCategoryPage.classList.remove('Active');
}

EditBtn.forEach(e => {
    e.onclick = () => {
        UpdateCategory.classList.add('Active');
    } 
});

UpCancelBtn.onclick = () => {
    UpdateCategory.classList.remove('Active');

}

// Start AJX Section

// Show Category Table
function LoadTable(){
    
    fetch('PHP/Category/ShowCategory.php')
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            Tbody.innerHTML = `<tr>
                                <td colspan="5" align="center"><h2>Category Not Found</h2></td>
                               </tr>`;
        }else{
            let Tr = '';
            for (let i = 0; i < Data.length; i++){
                Tr +=`<tr>
                        <td>${i+1}</td>
                        <td>${Data[i].Category_Name}</td>
                        <td>${Data[i].Posts}</td>
                        <td><i data-Edit='${Data[i].Category_ID}' class="fa-solid fa-pen-to-square Edit"></i></td>
                        <td><i data-Delete='${Data[i].Category_ID}' class="fa-solid fa-trash Trash"></i></td>
                      </tr>`;
            }

            Tbody.innerHTML = Tr;
        }
    })

};
LoadTable();

// Inset Category into database
$('#AddCat-Btn').click(function(e){
    e.preventDefault();

    if ($('#CategoryName').val() !== '') {
        let FData = new FormData(AddForm)
        fetch('PHP/Category/Insert.php',{
            method: 'POST',
            body: FData
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data.Status == 'Success') {
                ShowMessage(SuccessMessage, 'Category Created Successfully');
                AddCancelBtn.click();
                AddForm.reset();
                LoadTable();

            }else if(Data.Status = 'Category Name have a already'){    
                ShowMessage(ErrorMessage, Data.Status);
            }

        })
    }else{
        ShowMessage(ErrorMessage, 'Enter The Category Name');
    }

});

function ShowMessage(Message, Text){
    Message.classList.add('Active');
    TextValue = Message.querySelector('p').innerText = Text;
    setTimeout(() => {
        Message.classList.remove('Active');
    }, 3000);
}



// Update Category
let UpCN = '';
// Category Old Data Get
$(document).on('click', '.Edit', function(){
    UpdateCategory.classList.add('Active');
    var EditID = $(this).attr("data-edit");
    fetch('PHP/Category/HistoryData.php?EditID='+EditID)
    .then((Response) => Response.json())
    .then((Data) => {          
        $('#UpCategoryName').val(Data[0].Category_Name);
        $('#CategoryID').val(Data[0].Category_ID);
        UpCN = $('#UpCategoryName').val();
            
    })
})


$('#UpUser-Cancel').click(function(){
    UpUserPage.classList.remove('Active');
})

$('#UpCat-Btn').click(function(e){
    e.preventDefault();

    if ($('#UpCategoryName').val() !== '') {
        
        if (UpCN !== $('#UpCategoryName').val()) {

            let UpData = new FormData(UpForm);
            console.log(UpData);
            fetch('PHP/Category/Update.php',{
                method: 'POST',
                body: UpData
            })
            .then((Response) => Response.json())
            .then((Data) => {
                console.log(Data);
                if (Data.Status == 'Success') {
                    ShowMessage(SuccessMessage, 'Category Updated Successfully');
                    UpCancelBtn.click();
                    LoadTable();

                }else if(Data.Status == 'Category Name have a already'){
                    ShowMessage(ErrorMessage, Data.Status);
                }else{
                    ShowMessage(ErrorMessage, 'Please Try Again');
                }

            })
            .catch()            
        }else{
            UpCancelBtn.click();
        }

    }else{
        ShowMessage(ErrorMessage, 'Enter The Category Name');
        
    }
});

// this is for Delete Category// Delete Users
$(document).on('click', '.Trash', function(){
    var DeleteID = $(this).attr("data-delete");
    fetch('PHP/Category/Delete.php?DeleteID='+ DeleteID)
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data);
        if (Data.Status == 'Deleted') {
            ShowMessage(SuccessMessage, 'Category Deleted Successfully');
            $(this).closest('tr').fadeOut();
        }else{
            ShowMessage(ErrorMessage, 'Please Try Again');
        }

    })
    .catch()

});
