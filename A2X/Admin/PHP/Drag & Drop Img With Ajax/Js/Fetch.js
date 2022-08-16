
const UploadBtn = document.querySelector('#Upload');
const BrouseBtn = document.querySelector('#Brouse');
const InputFile = document.querySelector('#File');
const Form = document.querySelector('#Form');
const ImgContainer = document.querySelector('#ImageContaienr');
const DropTitle = document.querySelector('#DropTitle');



// if user click on Brouse Btn then
BrouseBtn.onclick = ()=>{
    InputFile.click();
}


let Files = [];

InputFile.onchange = ()=>{
    let File = InputFile.files;

    // This for collect the all Files in the input file
    for (let i = 0; i < File.length; i++) {
        if (Files.every(e => e.name !== File[i].name)) {
            Files.push(File[i]);
        };
        
    };

    Form.reset()
    ShowImage();
};



// This is for live Perview of the image
function ShowImage() {
    let Images = '';

    Files.forEach((Value, i) => {
        Images +=`
        <div class="Image">
            <img src="${URL.createObjectURL(Value)}" alt="Pruduct Image">
            <span class="material-icons" onclick="DelImg(${i})">close</span>
        </div>`;
    });
    
    ImgContainer.innerHTML = Images;

};

// this is for delete the image on cilck the close Btn
function DelImg(index){
    Files.splice(index, 1)
    ShowImage();

}


// Dragover
Form.addEventListener('dragover', function(e){
    e.preventDefault();
    Form.classList.add('Drag');
    DropTitle.innerHTML = '<h1>Your Image Drage here</h1>';

})


// DragLeave
Form.addEventListener('dragleave', function(e){
    e.preventDefault();
    Form.classList.remove('Drag');
    DropTitle.innerHTML = '<h2>Drop Img In This Area</h2>';

})


// Drop Image
Form.addEventListener('drop', function(e){
    e.preventDefault();
    let File = e.dataTransfer.files;

    // This for collect the all Files in the input file
    for (let i = 0; i < File.length; i++) {
        if (Files.every(e => e.name !== File[i].name)) {
            Files.push(File[i]);
        };
        
    };

    ShowImage();

})



// Insert Data into Database using Fetch API
UploadBtn.addEventListener('click', ()=>{
    let Data = new FormData();
    Files.forEach((Value, index) => Data.append(`file[${index}]`, Value));

    fetch('PHP/Upload.php', {
        method: 'POST',
        body: Data
    })
    .then((Response) => Response.json())
    .then((Data) => {
        console.log(Data.Status);
    })
    .catch()

})