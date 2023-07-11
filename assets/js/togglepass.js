$(function(){
    let pswrd = document.getElementsByClassName('pswrd');
    let pass1 =pswrd[0];
    let pass2 =pswrd[1];
    let togglebtn = document.querySelectorAll('.togglebtn');

    togglebtn[0].onclick = function(){
        if(pass1.type === 'password'){
            pass1.setAttribute('type', 'text');
            togglebtn[0].classList.add('hide');
        } else {
            pass1.setAttribute('type', 'password');
            togglebtn[0].classList.remove('hide');
        }
    }
    if(togglebtn[1]){
        togglebtn[1].onclick = function(){
            if(pass2.type === 'password'){
                pass2.setAttribute('type', 'text');
                togglebtn[1].classList.add('hide');
            } else {
                pass2.setAttribute('type', 'password');
                togglebtn[1].classList.remove('hide');
            }
        }
    }

})