const CurentPage = document.querySelectorAll('#SideBar ul li a');
CurentPage[2].classList.add('Active');


const ErrorMessage = document.getElementById('Error-Message');
const SuccessMessage = document.getElementById('Success-Message');
const AddRowBtn = document.getElementById('AddRow-Btn');
const AddProductPage = document.getElementById('AddProduct');
const ProUpCancelBtn = document.getElementById('ProUp-CancelBtn');
const AddProductBtn = document.getElementById('AddProductBtn');
const InserForm = document.getElementById('InserForm');
const ProdcutCont = document.getElementById('AllProdcut');
const AllRows = document.querySelector('#ALlTbale-Rows');
const AllMinus = document.querySelectorAll('#ALlTbale-Rows .inputs span');

AddRowBtn.onclick = () => {
    AllRows.insertAdjacentHTML('beforeend',`<div class="inputs inputs1">
                                                <input class="Title" type="text" placeholder="Title">
                                                <input class="RDetails" type="text" placeholder="Description">
                                                <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs1')"><i class="fa-solid fa-circle-minus"></i></span>
                                            </div>`);
    
}

ProUpCancelBtn.onclick = () => {
    AddProductPage.classList.remove('Active');
}


// This is for update Toggle page
const UpAddRowBtn = document.getElementById('UpAddRow-Btn');
const CloseUpForm = document.getElementById('Up-CancelBtn');
const UpdateProPage = document.getElementById('UpdateProduct');
const UpAllRows = document.querySelector('#UpTbale-Rows');
const ProUpdateBtn = document.querySelectorAll('.Pro-UpdateBtn');

UpAddRowBtn.onclick = () => {
    UpAllRows.insertAdjacentHTML('beforeend',`<div class="inputs inputs2">
                                                <input class="Title" type="text" placeholder="Title">
                                                <input class="RDetails" type="text" placeholder="Description">
                                                <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs2')"><i class="fa-solid fa-circle-minus"></i></span>
                                            </div>`);
}

CloseUpForm.onclick = () => {
    UpdateProPage.classList.remove('Active');
}



// Start AJX Part
AddProductBtn.onclick = () => {
    AddProductPage.classList.add('Active');

    // Get Category name
    fetch('PHP/Product/ShowCategory.php')
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            $('#AddSelect').html(`<option disable >Not Found</option>`);
        }else{
            let Tr = '';
            for (let i = 0; i < Data.length; i++){
                Tr += `<option value='${Data[i].Category_ID}'>${Data[i].Category_Name}</option>`;
            }

            $('#AddSelect').html(Tr);
        }
    })

    
}

// This is for Img Method for uploading the img
const InputFile = document.querySelector('#File');
const ImgContainer = document.querySelector('#All-Drops');


let Files = [];

InputFile.onchange = ()=>{
    let File = InputFile.files;

    // This for collect the all Files in the input file
    for (let i = 0; i < File.length; i++) {
        if (Files.every(e => e.name !== File[i].name)) {
            Files.push(File[i]);
        };
        
    };

    ShowImage();
    InputFile.value = '';
};

// This is for live Perview of the image
function ShowImage() {
    let Images = '';

    Files.forEach((Value, i) => {
        Images +=`
        <div class="DropPhotos">
            <img src="${URL.createObjectURL(Value)}" alt="Product Img">
            <i class="material-icons" onclick="DelImg(${i})">close</i>
        </div>`;
    });
    
    ImgContainer.innerHTML = Images;

};

// this is for delete the image on cilck the close Btn
function DelImg(index){
    Files.splice(index, 1)
    ShowImage();

}

// Insert Data into Database using Fetch API
const ProUploadBtn = document.getElementById('ProUploadBtn');
ProUploadBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    let TableData = document.querySelectorAll('.inputs1');

    let TableStatus = true;
    for (let i = 0; i < TableData.length; i++) {
        if (TableStatus == true) {
            Title = TableData[i].querySelector('.Title').value;
            RDetails = TableData[i].querySelector('.RDetails').value;
            if ((Title == '') || (RDetails == '')) {
                TableStatus = false;
            }
            
        }
    }

    if (($('#PTitle').val() !== '') && ($('#PPrice').val() !== '') && ($('#AddSelect').val() !== '') && ($('#PDesc').val() !== '') && (Files.length > 0) && (TableStatus == true)) {

        let PrpUpData = new FormData(InserForm);
        Files.forEach((Value, index) => PrpUpData.append(`file[${index}]`, Value));
    
        // This is for get all table list
        let TableTitle = [];
        let TableDesc = [];
        for (let i = 0; i < TableData.length; i++) {
    
            Title = TableData[i].querySelector('.Title').value;
            RDetails = TableData[i].querySelector('.RDetails').value;
            TableTitle[i] = Title;
            TableDesc[i] = RDetails;
        }
        PrpUpData.append('TableTitle', TableTitle);
        PrpUpData.append('TableDesc', TableDesc);
    
        // Start Fetch API
        fetch('PHP/Product/InsertProduct.php', {
            method: 'POST',
            body: PrpUpData
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data.Status == 'Success') {
                LoadProduct();
                // ImgContainer.innerHTML = '';
                ProUpCancelBtn.click();
                Files = [];
                // InserForm.reset();
                ShowImage();    
                AllRows.innerHTML = `<div class="inputs inputs1">
                                        <input class="Title" type="text" placeholder="Title">
                                        <input class="RDetails" type="text" placeholder="Description">
                                        <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs1')"><i class="fa-solid fa-circle-minus"></i></span>
                                    </div>
                                    <div class="inputs inputs1">
                                        <input class="Title" type="text" placeholder="Title">
                                        <input class="RDetails" type="text" placeholder="Description">
                                        <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs1')"><i class="fa-solid fa-circle-minus"></i></span>
                                    </div>`;
                ShowMessage(SuccessMessage, 'Product Save Successfully');
    
            }else if (Data.Status == 'File Extantion Problem') {
                ShowMessage(ErrorMessage, 'Please Choose the Img');
                
            }else{
                ShowMessage(ErrorMessage, 'Please Try Again');
                
            }
        })
        .catch()
    }else{
        ShowMessage(ErrorMessage, 'All Fields are required');
        
    }


})

console.log('Hello');

function ShowMessage(Message, Text){
    Message.classList.add('Active');
    TextValue = Message.querySelector('p').innerText = Text;
    setTimeout(() => {
        Message.classList.remove('Active');
    }, 3000);
}

// Show Data
function LoadProduct(){
    fetch('PHP/Product/ShowProduct.php')
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            ShowMessage(ErrorMessage, 'Not Have Any Product');

        }else{
            let Tr = '';
            for (let i = 0; i < Data.length; i++){
                ProImgs = Data[i].Pro_Img.split(",");
                Tr +=`<div class="Product">
                        <img src="../Img/${ProImgs[0]}" alt="">
                        <div class="Pro-Btn">
                            <div class="Up-Vi">
                                <button data-Edit='${Data[i].Pro_ID}' class="Pro-UpdateBtn">Update</button>
                                <a href="http://localhost/A2X/SingleProduct.php?ProID=${Data[i].Pro_ID}" target="_"><button>View</button></a>
                            </div>
                            <button data-Delete='${Data[i].Pro_ID}' class="Delete">Delete</button>
                        </div>
                      </div>`;
            }

            ProdcutCont.innerHTML = Tr;
        }
        
    })
}
LoadProduct();






// Start Update Part



// This is for Img Method for uploading the img
const UpFile = document.querySelector('#UpFile');
const UpImgContainer = document.querySelector('#All-UpDrops');

let Files2 = [];

UpFile.onchange = ()=>{
    let File2 = UpFile.files;

    // This for collect the all Files in the input file
    for (let i = 0; i < File2.length; i++) {
        if (Files2.every(e => e.name !== File2[i].name)) {
            Files2.push(File2[i]);
        };
        
    };

    UpShowImage();
    // UpFile.value = '';
};

// This is for live Perview of the image
function UpShowImage() {
    let Images = '';

    Files2.forEach((Value, i) => {
        Images +=`
        <div class="DropPhotos">
            <img src="${URL.createObjectURL(Value)}" alt="Product Img">
            <i class="material-icons" onclick="UpDelImg(${i})">close</i>
        </div>`;
    });
    
    UpImgContainer.innerHTML = Images;

};

// this is for delete the image on cilck the close Btn
function UpDelImg(index){
    Files2.splice(index, 1)
    UpShowImage();

}

$('#UploadBtn').click(function(){
    console.log(Files2);
    console.log(UpFile.value);
});


// Open Update Form and Get History Data for Update
$(document).on('click', '.Pro-UpdateBtn', function(){
    UpdateProPage.classList.add('Active');
    var EditID = $(this).attr("data-edit");
    fetch('PHP/Product/ProHistory.php?EditID='+EditID)
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data);
        let UpSelect = document.getElementById('UpSelect');
        let UST = '';
        for (let i = 0; i < Data.Category.length; i++) {
            if (Data.Category[i].Category_ID == Data.ProData[0].Pro_Category) {
                UST += `<option value='${Data.Category[i].Category_ID}' selected>${Data.Category[i].Category_Name}</option>`
            }else{
                UST += `<option value='${Data.Category[i].Category_ID}'>${Data.Category[i].Category_Name}</option>`
            }
            
        }
        UpSelect.innerHTML = UST;




        $('#UpTitle').val(Data.ProData[0].Pro_Title);        
        $('#UpPrice').val(Data.ProData[0].Pro_Price);        
        $('#UpDesc').val(Data.ProData[0].Pro_Desc);   
        $('#OldPhotos').val(Data.ProData[0].Pro_Img);


        // This is for Details table
        UTTile = Data.ProData[0].Pro_TTitle.split(",");
        UTDesc = Data.ProData[0].Pro_TDesc.split(",");
        console.log(UTTile);
        console.log(UTDesc);

        let AllTD = '';
        for (let i = 0; i < UTTile.length; i++) {
            AllTD +=`<div class="inputs inputs2">
                                                        <input class="Title" value="${UTTile[i]}" type="text" placeholder="Title">
                                                        <input class="RDetails" value="${UTDesc[i]}" type="text" placeholder="Description">
                                                        <span onclick="this.parentElement.style.display = 'none'; this.parentElement.classList.remove('inputs2')"><i class="fa-solid fa-circle-minus"></i></span>
                                                    </div>`;
        }
        UpAllRows.innerHTML = AllTD;

            
    })

    
});

// Start Delete Part
$(document).on('click', '.Delete', function(){

    var DeleteID = $(this).attr("data-delete");
    console.log(DeleteID);
    fetch('PHP/Product/Delete.php?DeleteID='+DeleteID)
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data);
        if (Data.Status == 'Deleted') {
            $(this).closest('.Product').fadeOut();
            ShowMessage(SuccessMessage, 'Product Deleted Successfully');

        }else{
            ShowMessage(ErrorMessage, 'Please Try Again');
        }

    })
    .catch()

});
