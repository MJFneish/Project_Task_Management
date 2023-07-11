import countDown from './countDown.js';
$(function() {
    const taskForm = document.querySelector("#task_edit_form"),
        errorTxtForget = document.querySelector(".error-text");

    let tname = document.getElementById('tname').value;
    let description = document.getElementById('description').value;
    let deadline_date = document.getElementById('deadline_date').value;


    var taskDeadline, countDownDate;

    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST", "actions/getTaskData.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState  === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = JSON.parse(xhr.responseText);
                if(data.response === "success")
                {
                    taskDeadline = data.deadline_date;
                    countDownDate = new Date(taskDeadline).getTime();
                    countDown(countDownDate,parseInt(data.completed));
                }else {
                    console.log(data);
                }
            }
        }
    }
    xhr.send();

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
    $('#delete').on('click', () =>{
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this task!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    let xhr = new XMLHttpRequest(); //creating xml object
                    xhr.open("POST", "actions/task-delete.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("Your task is deleted!", {
                                        icon: "success",
                                    }).then(()=>{
                                        location.href='project.php';
                                    });

                                }else{
                                    errorTxtForget.innerHTML = data;
                                    errorTxtForget.style.display = "flex";
                                }
                            }
                        }
                    }
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send('delete=true');


                } else {
                    swal("Your task is not deleted!",{icon: "error"});
                }
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
                    xhr.open("POST", "actions/task-save-changes.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("Your task has been changed successfully!", {
                                        icon: "success",
                                    });
                                    tname = document.getElementById('tname').value;
                                    description = document.getElementById('description').value;
                                    deadline_date = document.getElementById('deadline_date').value;
                                    document.querySelector('.head h2').innerHTML = '<span style="color:#695CFE" >Task: </span> ' +tname;
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
    $('#complete').on('click', () =>{
        swal({
            title: "Are you sure?",
            text: "This task will be set as completed! do you want to proceed?",
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
                    xhr.open("POST", "actions/task-complete.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("Your task is set "+ text +"!", {
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