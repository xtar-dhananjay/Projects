const MessageCloseBtn = document.getElementById('MessageBox-Close');
const ShowMessageArea = document.getElementById('ShowMessage');
const ShowMessageBtn = document.querySelectorAll('.ReadBtn');
const Part2 = document.getElementById('Part2');
const Part1 = document.getElementById('Part1');
const BackBtn = document.getElementById('BackBtn');
const ContCheckBtn = document.getElementById('Cont-CheckBtn');
const InqCheckBtn = document.getElementById('Inq-CheckBtn');
const TableTitle = document.getElementById('TableTitle');


ShowMessageBtn.forEach(element => {
    element.onclick = () => {
        ShowMessageArea.classList.add('Active');
    }
});

MessageCloseBtn.onclick = () => {
    ShowMessageArea.classList.remove('Active');
}

// This is for Show All Data page
ContCheckBtn.onclick = () => {
    Part1.classList.remove('Active');   
    Part2.classList.add('Active');   
    TableTitle.innerText = 'All Contacts';
}

BackBtn.onclick = () => {
    Part2.classList.remove('Active');   
    Part1.classList.add('Active');   
}

InqCheckBtn.onclick = () => {
    Part1.classList.remove('Active');   
    Part2.classList.add('Active');  
    TableTitle.innerText = 'All Inquiry';
}