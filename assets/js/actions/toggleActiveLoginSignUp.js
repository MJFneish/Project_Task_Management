$(function (){

    $('#LOGIN').on('click', ()=> updateActiveLoginSignUp('login'));
    $('#SIGNUP').on('click', ()=> updateActiveLoginSignUp('signup'));

    function updateActiveLoginSignUp(switchTo){
        if((switchTo === "signup" && !$('.signup').hasClass('active')) || (switchTo === "login" && !$('.login').hasClass('active'))){
            if(switchTo === "signup"){
                $('#SWAP').addClass('toright');
                $('.login').removeClass('active');
                $('.signup').addClass('active');
            }else{
                $('#SWAP').removeClass('toright');
                $('.login').addClass('active');
                $('.signup').removeClass('active');
            }
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "actions/updateActiveLoginSignUp.php", true);
            xhr.onload= () =>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        
                        if(data === "success"){
                            // console.log('switch to '+ switchTo);
                        }else{
                            // console.log(data);
                        }
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("switchTo="+switchTo);
        }

    }
})