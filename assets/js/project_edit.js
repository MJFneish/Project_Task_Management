$(function (){
    const projectForm = document.querySelector("#project_edit_form"),
    errorTxtForget = document.querySelector(".error-text");

    $("form").submit(function(e){
        e.preventDefault();
    });

    let pname = document.getElementById('pname').value;
    let client = document.getElementById('client').value;
    let description = document.getElementById('description').value;
    let deadline_date = document.getElementById('deadline_date').value;

    $('#cancel').on('click', ()=>{
        document.getElementById('pname').value = pname
        document.getElementById('client').value = client
        document.getElementById('description').value = description
        document.getElementById('deadline_date').value = deadline_date
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
                    xhr.open("POST", "actions/project-save-changes.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("Your project has been changed successfully!", {
                                        icon: "success",
                                    });
                                    pname = document.getElementById('pname').value;
                                    client = document.getElementById('client').value;
                                    description = document.getElementById('description').value;
                                    deadline_date = document.getElementById('deadline_date').value;
                                }else{
                                    errorTxtForget.innerHTML = data;
                                    errorTxtForget.style.display = "flex";
                                }
                            }
                        }
                    }
                    // we have to send the form data through ajax to php
                    let formData = new FormData(projectForm); //creating new formData Object
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
    $('#complete').on('click', () =>{
        swal({
            title: "Are you sure?",
            text: "This project will be set as completed!\n Perhaps all save tasks that are not completed will be completed and there is no fallback!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    let text = ($("#complete span").text()).toLowerCase();
                    let postText = text ==="complete"? 'completed': 'uncompleted';
                    // console.log(text+ " " + postText);
                    let xhr = new XMLHttpRequest(); //creating xml object
                    xhr.open("POST", "actions/project-complete.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("Your Project is set "+ text +"!", {
                                        icon: "success",
                                    });
                                    if(text === 'complete')
                                        $("#complete span").text("uncomplete");
                                    else
                                        $("#complete span").text("complete");
                                }else{
                                    errorTxtForget.innerHTML = data;
                                    errorTxtForget.style.display = "flex";
                                }
                            }
                        }
                    }
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send("complete="+postText);

                } else {
                    swal("No action done!",{icon: "error"});
                }
            });
    });
});