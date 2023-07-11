$(function(){
    
    const form = document.querySelector(".login");
    const continueBtn = document.querySelector(".loginSubmit");
    const errorTxt = document.querySelector(".error-text");

    form.onsubmit = (e)=>{
        e.preventDefault(); //preventing form from submitting
    }

    continueBtn.onclick = () =>{
        // let's start ajax
        let xhr = new XMLHttpRequest(); //creating xml object
        xhr.open("POST", "actions/login.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState  === XMLHttpRequest.DONE)
            {
                if(xhr.status === 200)
                {
                    let data = xhr.response;
                    if(data == "success")
                    {
                        location.href = "index.php";
                    }else {
                        errorTxt.textContent = data;
                        errorTxt.style.display = "flex";
                        // console.log(data);
                    }
                }
            }
        }
        // we have to send the form data through ajax to php
        let formData = new FormData(form); //creating new formData Object
        xhr.send(formData); //sending the form data  to php
    }
})