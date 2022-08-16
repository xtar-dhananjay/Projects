function LoadTable(){

    fetch('PHP/LoadTable.php')
    .then((Response) => Response.json())
    .then((Data) => {
        let Tbody = document.querySelector('tbody');    
        if (Data['Empty']) {
            Tbody.innerHTML = '<tr><td colspan="6" align="center"><h2>Record Not Found</h2></td></tr>'
        }else{
            let Tr = '';
            for(var i in Data){
                Tr +=`<tr>
                        <td>${Data[i].id}</td>
                        <td>${Data[i].first_name} ${Data[i].last_name}</td>
                        <td>${Data[i].class_name}</td>
                        <td>${Data[i].city}</td>
                        <td align="center"><button class='edit-btn' onclick="EditRecord(${Data[i].id})">Edit</button></td>
                        <td align="center"><button class='delete-btn' onclick="DeleteRecord(${Data[i].id})">Delete</button></td>
                      </tr>`
            }

            Tbody.innerHTML = Tr;
        }
        
    })
    .catch((error)=>{
        Message('Error', "Can't Fetch Data");
    });
}

LoadTable();



// This is for show add students Form and Load Class Options
function addNewModal(){
    let AddForm = document.querySelector('#addModal');
    AddForm.style.display = 'block';

    fetch('PHP/LoadOptions.php')
    .then((Response) => Response.json())
    .then((Data) => {
        if (Data['Empty']) {
            Message('Error', 'Options Can\'t Fetch');
        }else{
            let ClassList = document.querySelector('#classlist');
            let ClassOptions = `<option value='${0}' disabled >Select Class</option>`
            for (let i = 0; i < Data.length; i++) {
                ClassOptions += `<option value='${Data[i].cid}'>${Data[i].class_name}</option>`
            }
    
            ClassList.innerHTML = ClassOptions;
        }
    })
    .catch((error)=>{
        Message('Error', 'Options Can\'t Fetch');
    });


}


// This is for hide add students Form
function hide_modal(){
    let AddForm = document.querySelector('#addModal');
    AddForm.style.display = 'none';

    let EditForm = document.querySelector('#modal');
    EditForm.style.display = 'none';
}


function submit_data(){
    
    // Get all value in the form
    let Fname = document.querySelector('#fname').value;
    let Lname = document.querySelector('#lname').value;
    let ClasList = document.querySelector('#classlist').value;
    let City = document.querySelector('#city').value;

    let FormData = '';

    // If user Not fill all field's then 
    if (Fname === '' || Lname === '' || ClasList === '' || City === '') {
        alert('All fields Are Requerd');
        
    }else{
        FormObj = {
            'Fname' : Fname,
            'Lname' : Lname,
            'ClasList' : ClasList,
            'City' : City
        }
    
        FormData = JSON.stringify(FormObj);
        
        fetch('PHP/InsertData.php', {
            method: "POST",
            body: FormData,
            headers: {
                'Content-type' : 'application/json',
            }
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data.Insert == 'Success') {
                LoadTable();
                document.getElementById('AddForm').reset();
                Message('Success', 'Data Successfully Inserted');
                hide_modal();
            }else{
                hide_modal();
                Message('Error', 'Data Not Inserted !');
            }
        })
        .catch((error)=>{
            // hide_modal();
            Message('Error', 'Data Not Inserted !');
        })

    }

}


// Fetch old Data for Edit Record
function EditRecord(Sid){
    
    let EditForm = document.querySelector('#modal');
    EditForm.style.display = 'block';
    let ID = Sid;

    fetch(`PHP/OldData.php?Sid=${ID}`)
    .then((Response) => Response.json())
    .then((Data) => {

        // Get all value in the form
        let SID = document.querySelector('#edit-id').value = Data['Student'][0].id;
        let Fname = document.querySelector('#edit-fname').value = Data['Student'][0].first_name;
        let Lname = document.querySelector('#edit-lname').value = Data['Student'][0].last_name;
        let City = document.querySelector('#edit-city').value = Data['Student'][0].city;
        let Cl = Data['Student'][0].class;
        let Option = `<option value='${0}' disabled >Select Class</option>`;
        let Select = ''
        for(var i in Data['Class']){
            if (Cl == Data['Class'][i].cid) {
                Select = 'Selected'
            }else{
                Select = ''

            }
            
            Option += `<option ${Select} value='${Data['Class'][i].cid}'>${Data['Class'][i].class_name}</option>`
        }

        document.querySelector('#edit-class').innerHTML = Option;

    });

}


// Update Record

function modify_data(){

    // Get all value in the form
    let SID = document.querySelector('#edit-id').value;
    let Fname = document.querySelector('#edit-fname').value;
    let Lname = document.querySelector('#edit-lname').value;
    let City = document.querySelector('#edit-city').value;
    let ClasList = document.querySelector('#edit-class').value;

    let FormData = '';

    // If user Not fill all field's then 
    if (Fname === '' || Lname === '' || ClasList === '0' || City === '') {
        alert('All fields Are Requerd');
        
    }else{
        FormObj = {
            'SID' : SID,
            'Fname' : Fname,
            'Lname' : Lname,
            'ClasList' : ClasList,
            'City' : City
        }
    
        FormData = JSON.stringify(FormObj);
        
        fetch('PHP/UpdateData.php', {
            method: "PUT",
            body: FormData,
            headers: {
                'Content-type' : 'application/json',    // headers method only apply on the server(PHP) file No this JavaScript file and this headers basd on sand data form this file to server(PHP) file
            }
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data.Update == 'Success') {
                LoadTable();
                Message('Success', 'Data Successfully Update');
                hide_modal();
            }else{
                hide_modal();
                Message('Error', 'Data Not Udpated !');
            }
        })
        .catch((error)=>{
            Message('Error', 'Data Not Udpated ! : Server Problem');
        })

    }

}

// Delete Record From the Database
function DeleteRecord(Did){

    if (confirm('Are you sure want to delete this record ?')) {
        
        fetch(`PHP/DelData.php?Did=${Did}`, {
            method: "DELETE",
        })
        .then((Response) => Response.json())
        .then((Data) => {
            if (Data.Delete == 'Success') {
                LoadTable();
                Message('Success', 'Data Successfully Deleted');
            }else{
                Message('Error', 'Data Not Deleted !');
            }
        })
        .catch((error)=>{
            Message('Error', 'Data Not Deleted ! : Server Problem');
        })


    }



}

function load_search(){

    let SearchTerm = document.querySelector('#search').value;

    if (SearchTerm == '') {
        LoadTable();
    }else{
        fetch(`PHP/SearchData.php?SearchTerm=${SearchTerm}`)
        .then((Response) => Response.json())
        .then((Data) => {
            let Tbody = document.querySelector('tbody');    
            if (Data['Empty']) {
                Tbody.innerHTML = '<tr><td colspan="6" align="center"><h2>Record Not Found</h2></td></tr>'
            }else{
                let Tr = '';
                for(var i in Data){
                    Tr +=`<tr>
                            <td>${Data[i].id}</td>
                            <td>${Data[i].first_name} ${Data[i].last_name}</td>
                            <td>${Data[i].class_name}</td>
                            <td>${Data[i].city}</td>
                            <td align="center"><button class='edit-btn' onclick="EditRecord(${Data[i].id})">Edit</button></td>
                            <td align="center"><button class='delete-btn' onclick="DeleteRecord(${Data[i].id})">Delete</button></td>
                          </tr>`
                }
    
                Tbody.innerHTML = Tr;
            }
            
        })
        .catch((error)=>{
            Message('Error', "Can't Fetch Data");
        });
    }


}


// This is for Showing Message
function Message(Type, Message){
    if (Type == 'Error') {                  // in this condition you are only use var method for difining any variable
        var MessageBox = document.querySelector('#error-message');
    }else {
        var MessageBox = document.querySelector('#success-message');
        
    }
    MessageBox.innerHTML = Message;
    MessageBox.style.display = "block";
    setInterval(() => {
        MessageBox.style.display = "none";
    }, 3000);
}


