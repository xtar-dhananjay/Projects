let ForGetEmail = document.getElementById('ForGetEmail');
let ForGetBtn = document.getElementById('ForGetBtn');

ForGetBtn.onclick = (e) => {
    
    // Email
    let Mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(ForGetEmail.value.match(Mailformat)){
        ForGetEmail.style.borderColor = "#ffffff";
    }else{
        ForGetEmail.style.borderColor = "red";
        e.preventDefault();

    }

}

// Email
ForGetEmail.onkeyup = () => { 
    let Mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(ForGetEmail.value.match(Mailformat)){
        ForGetEmail.style.borderColor = "#ffffff";
    }
}