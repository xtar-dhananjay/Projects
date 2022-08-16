let QA = document.querySelectorAll('.QA');
console.log(QA);

QA.forEach(e => {
    let QAPlus = e.getElementsByClassName('material-icons');
    QAPlus[0].onclick = () => {
        let QAPara = e.querySelector('p');
        let QNIcon = e.querySelector('.Quation span');
        QAPara.classList.toggle('QAactive');
        if (QNIcon.innerText == 'add') {
            QNIcon.innerText = 'remove';
        }else{
            QNIcon.innerText = 'add';

        }
    }
});

// This is for Text Effect
const Text = document.querySelector('#Text');

const TextLoad = () => {
    setTimeout(() => {
        Text.textContent = "Design";
    }, 0);
    setTimeout(() => {
        Text.textContent = "Coding";
    }, 4000);
    setTimeout(() => {
        Text.textContent = "Excel";
    }, 8000);
}

TextLoad();
setInterval(TextLoad, 12000);