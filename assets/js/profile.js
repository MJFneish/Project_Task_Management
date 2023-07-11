$(function (){
    const profileForm = document.querySelector("#profile-form");
    const errorTxtForget = document.querySelector(".error-text");

    let fileInput = document.getElementById("uimage");
    let accountUserImage = document.getElementById('avatar');
    let logo = document.querySelector('.image-text .image a img');
    let image = accountUserImage.src;
    let name = document.getElementById('uname').value;
    let email = document.getElementById('uemail').value;
    let pass = document.getElementById('upassword').value;

    $("form").submit(function(e){
        e.preventDefault();
    });
    fileInput.onchange = ()=>{
        if (fileInput.files[0]) {
            accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
        }
    };
    $('#cancel').on('click', ()=>{
        fileInput.value = '';
        accountUserImage.src = image;
        logo.src = image;
        document.getElementById('uname').value = name;
        document.getElementById('uemail').value = email;
        document.getElementById('upassword').value = pass;
        swal({
            title: "Cancled",
            text: "Your Data has been Retreived!",
            icon: "error",
        });
    });

    $('#save').on('click', ()=>{
        swal({
            title: "Are you sure?",
            text: "Once Saving, you will not be able to recover your previous data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willSave) => {
            if (willSave) {
                let xhr = new XMLHttpRequest(); //creating xml object
                xhr.open("POST", "actions/profile-save-changes.php", true);
                xhr.onload = ()=>{
                    if(xhr.readyState  === XMLHttpRequest.DONE)
                    {
                        if(xhr.status === 200)
                        {
                            let data = xhr.response;

                            if(data == "success")
                            {
                                swal("Your profile has been changed successfully!", {
                                    icon: "success",
                                });
                                fileInput.value = '';
                                image = accountUserImage.src;
                                name = document.getElementById('uname').value;
                                email = document.getElementById('uemail').value;
                                pass = document.getElementById('upassword').value;
                                document.querySelector('.header-text .name').textContent  = name;
                                document.querySelector('.header-text .profession').textContent  = email;
                                logo = window.URL.createObjectURL(fileInput.files[0]);
                            }else{
                                errorTxtForget.innerHTML = data;
                                errorTxtForget.style.display = "flex";
                                // console.log(data)
                            }
                        }
                    }
                }
                // we have to send the form data through ajax to php
                let formData = new FormData(profileForm); //creating new formData Object
                xhr.send(formData); //sending the form data  to php
            } else {
                swal({
                    title: "PHEW !",
                    text: " your data hasn't been changed",
                    icon: "error",
                  });
            }
          });
          
    });
    $('#delete').on('click', ()=>{
        swal({
            title: "Are you sure?",
            text: "Once deleted your account, you will not be able to recover it!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                let xhr = new XMLHttpRequest(); //creating xml object
                xhr.open("POST", "actions/profile-delete-account.php", true);
                xhr.onload = ()=> {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let data = xhr.response;
                            if (data == "success") {
                                swal("Your account has been deleted successfully!", {
                                    icon: "success",
                                }).then(() => {
                                    location.href = 'actions/logout.php';
                                });
                            } else {
                                errorTxtForget.innerHTML = data;
                                errorTxtForget.style.display = "flex";
                            }
                            // console.log(data)
                        }
                    }
                }
                xhr.send();
            } else {
                swal({
                    title: "PHEW !",
                    text: " your account hasn't been deleted",
                    icon: "error",
                });
            }
          });
    });
});