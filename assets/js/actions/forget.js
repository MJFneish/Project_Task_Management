$(function(){
    const forgetForm = document.querySelector(".forget");
    const confirmForm = document.querySelector(".confirm");

    const errorTxtForget = document.querySelector(".error-text");
    const emailInputBox = document.querySelector(".forget input");
    const errorTxtConfirm = document.querySelector(".error-text-confirm");
    const confirmPassInputBox = document.querySelector(".confirm input");

    forgetForm.onsubmit = (e)=>{
        e.preventDefault(); //preventing form from submitting
    }
    confirmForm.onsubmit = (e)=>{
        e.preventDefault(); //preventing form from submitting
    }
    $('.forgetSubmit').click( () =>{
        // let's start ajax
        let xhr = new XMLHttpRequest(); //creating xml object
        xhr.open("POST", "actions/forget.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState  === XMLHttpRequest.DONE)
            {
                if(xhr.status === 200)
                {
                    let data = xhr.response;
                    
                    if(data == "success")
                    {
                        $('.forget_box').removeClass('active');
                        $('.confirm_box').addClass('active');
                        // console.log('done');
                    }else{
                        errorTxtForget.innerHTML = data;
                        errorTxtForget.style.display = "flex";
                        // console.log(data);
                    }
                }
            }
        }
        // we have to send the form data through ajax to php
        let formData = new FormData(forgetForm); //creating new formData Object
        xhr.send(formData); //sending the form data  to php
    });
    
    $('.confirmSubmit').click( () =>{
        var email = emailInputBox.value;
        let vercode = confirmPassInputBox.value;
        
        let xhr = new XMLHttpRequest(); //creating xml object
        xhr.open("POST", "actions/confirm.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState  === XMLHttpRequest.DONE)
            {
                if(xhr.status === 200)
                {
                    let data = xhr.response;
                    
                    if(data == "success")
                    {
                        // alert("password successfully changed");
                        swal('Success', 'password successfully changed' , 'success');
                        location.href = "login.php";
                    }else{
                        errorTxtConfirm.textContent = data;
                        errorTxtConfirm.style.display = "flex";
                    }
                }
            }
        }

        // we have to send the form data through ajax to php

        let formData = new FormData(confirmForm); //creating new formData Object
        formData.append('uemail',email);
        formData.append('vercode',vercode);
        xhr.send(formData); //sending the form data  to php
    });

    /*
    $(window).bind('beforeunload', function(event){ // to reset_password to 0
        event.preventDefault();
        let xhr = new XMLHttpRequest(); //creating xml object
        xhr.open("POST", "actions/reset_password.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState  === XMLHttpRequest.DONE)
            {
                if(xhr.status === 200)
                {
                    let data = xhr.response;
                    
                    if(data == "success")
                    {
                        alert("are you sure want to leave?");
                    }else{
                        confirmForm.log(data);
                    }
                }
            }
        }
        let formData = new FormData(confirmForm); //creating new formData Object
        formData.append('uemail',email);
        xhr.send(formData); //sending the form data  to php
        return (event.returnValue = "");
    });*/



})
