// this is for Show active Page
let CourseTab = document.querySelectorAll('#ManuBar li');
CourseTab[0].classList.remove('ActivePage');
CourseTab[1].classList.add('ActivePage');

let PlayVideo = document.getElementById('PlayVideo');
let Videos = document.querySelectorAll('#Video-List .Vid');

Videos.forEach( e => {
    e.onclick = () => {   
        Videos.forEach( v => {
            v.classList.remove('ActiveVideo');
        });
        e.classList.add('ActiveVideo');
        let ClickVid = e.querySelector('video');
        if (e.classList.contains('ActiveVideo')) {
            PlayVideo.src = ClickVid.src;
        }
        
    }



    // Start geting the video duration
    let DurationBox = e.querySelector('.Video-Details p');
    
    let ListVid = e.querySelector('video');

    let i = setInterval(function() {
        if(ListVid.readyState > 0) {
            let Vhours = Math.floor(parseInt(ListVid.duration / 3600));
            let Vminutes = Math.floor(parseInt(ListVid.duration / 60 % 60));
            let Vseconds = Math.floor(ListVid.duration % 60);
            let FHour = '';
            let FMin = '';
            let FSec = '';
    
            if (Vhours == 0) {
                FHour = '';
            }else{
                FHour = Vhours;
            }
    
            if (Vminutes < 10) {
                FMin = '0'+Vminutes;
            }else{
                FMin = Vminutes;
            }
    
            if (Vseconds < 10) {
                FSec = '0'+Vseconds;
            }else{
                FSec = Vseconds;
            }
    
            if (FHour == '') {
                let VDuration = `${FMin}:${FSec}`;
                DurationBox.innerText = VDuration;
            }else{
                let VDuration = `${FHour}:${FMin}:${FSec}`;
                DurationBox.innerText = VDuration;
                
            }
            
            // (Put the minutes and seconds in the display)
    
            clearInterval(i);
        }
    }, 200);


});

// Start Make Commetn Toggle button
let ShowComment = document.getElementById('Show-Com');
let CommentsBox = document.getElementById('Comments-Box');
ShowComment.onclick = () => {
    console.log('This is working now');
    CommentsBox.classList.toggle('Active');

    if (ShowComment.textContent == 'Show') {
        ShowComment.textContent = 'Hide';
    }else{
        ShowComment.textContent = 'Show';
    }
}