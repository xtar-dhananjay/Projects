const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");
const SubmitBtn = document.getElementById('FormSubmit');

form.onsubmit = (e)=>{
  e.preventDefault();
  statusTxt.style.color = "#0D6EFD";
  statusTxt.style.display = "block";
  form.classList.add("disabled");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "MessageSand.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let response = xhr.response;
      if(response.indexOf("Email and message field is required!") != -1 || response.indexOf("Enter a valid email address!") != -1 || response.indexOf("Sorry, failed to send your message!") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 3000);
      }
      if (response !== '') {
        setTimeout(() => {
          SubmitBtn.classList.remove('Active');
          SubmitBtn.innerText = 'Successfully Sanded';
        }, 3000);
        
        setTimeout(() => {
          HideFormBtn.click();        
          form.reset();
        }, 4000);

      }
      form.classList.remove("disabled");
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}

// This is for Show and Hide Inquiry form
const InquiryForm = document.getElementById('wrapper');
const ShowFormBtn = document.getElementById('QueryBtn');
const HideFormBtn = document.querySelector('#Form-header span');

ShowFormBtn.onclick = () =>{
  InquiryForm.classList.add('Active');
  SubmitBtn.innerText = 'Sand Inquiry';
} 

HideFormBtn.onclick = () =>{
  InquiryForm.classList.remove('Active');
} 

SubmitBtn.onclick = () => {
  SubmitBtn.classList.add('Active');
  SubmitBtn.innerText = 'Inquiry Sanding...';
}