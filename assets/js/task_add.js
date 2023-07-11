$(function (){
    const taskForm = document.querySelector("#task_add_form");
    const errorTxtForget = document.querySelector('.error-text');


    $("form").submit(function(e){
        e.preventDefault();
    });

    let tname = document.getElementById('tname').value;
    let description = document.getElementById('description').value;
    let deadline_date = document.getElementById('deadline_date').value;

    $('#cancel').on('click', ()=>{
        document.getElementById('tname').value = tname
        document.getElementById('description').value = description
        document.getElementById('deadline_date').value = deadline_date
        swal({
            title: "Cancled",
            text: "Your Data has been Retreived!",
            icon: "error",
        });
    });
    $('#add').on('click', ()=>{
        swal({
            title: "Are you sure?",
            text: "This task will be added with the information you provide\ndo you want to proceed?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willSave) => {
                if (willSave) {
                    let xhr = new XMLHttpRequest(); //creating xml object
                    xhr.open("POST", "actions/task-add.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("This task has been added successfully!", {
                                        icon: "success",
                                    }).then(()=>{
                                    location.href='task.php';
                                });
                                }else{
                                    errorTxtForget.innerHTML = data;
                                    errorTxtForget.style.display = "flex";
                                }
                            }
                        }
                    }
                    // we have to send the form data through ajax to php
                    let formData = new FormData(taskForm); //creating new formData Object
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
});