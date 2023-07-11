import countDown from './countDown.js';
$(function(){
    const errorTxtForget = document.querySelector('.error-text');
    var projectDeadline, countDownDate, completedTasks;

    var cardColor, labelColor, headingColor, primaryColor;
    var roots = getComputedStyle(document.body);
    $('.toggle-switch').on('click', function (){
        roots = getComputedStyle(document.body);
        cardColor = roots.getPropertyValue('--body-color');
        labelColor = roots.getPropertyValue('--text-color');
        headingColor = roots.getPropertyValue('--text-color');
    });
    primaryColor = '#695CFE';
    cardColor = roots.getPropertyValue('--body-color');
    labelColor = roots.getPropertyValue('--text-color');
    headingColor = roots.getPropertyValue('--text-color');


    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST", "actions/getProjectData.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState  === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = JSON.parse(xhr.responseText);
                if(data.response === "success")
                {
                    projectDeadline = data.deadline_date;
                    if(data.nbr_tasks >0)
                        completedTasks = (data.nbr_tasks_completed*100)/data.nbr_tasks;
                    else
                        completedTasks = 100;

                    countDownDate = new Date(projectDeadline).getTime();
                    let completed = data.completed === "completed" ? 1: 0;
                    countDown(countDownDate, completed);
                    apex_chart(parseInt(completedTasks));
                }else {
                    console.log(data.response);
                }
            }
        }
    }
    xhr.send();

    // Update the count down every 1 second


    function apex_chart(completedTasks){
        const supportTrackerEl = document.querySelector('#supportTracker'),
            supportTrackerOptions = {
                series: [completedTasks],
                labels: ['Completed'],
                chart: {
                    height: 200,
                    type: 'radialBar'
                },
                plotOptions: {
                    radialBar: {
                        offsetY: 0,
                        startAngle: -140,
                        endAngle: 130,
                        hollow: {
                            size: '50%'
                        },
                        track: {
                            background: 'transparent',
                            strokeWidth: '100%'
                        },
                        dataLabels: {
                            name: {
                                offsetY: 0,
                                color: labelColor,
                                fontSize: '13px',
                                fontWeight: '400',
                                fontFamily: 'Public Sans'
                            },
                            value: {
                                offsetY: 10,
                                color: headingColor,
                                fontSize: '13px',
                                fontWeight: '600',
                                fontFamily: 'Public Sans'
                            }
                        }
                    }
                },
                colors: [primaryColor],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        shadeIntensity: 0.5,
                        gradientToColors: [primaryColor],
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 0.6,
                        stops: [30, 70, 100]
                    }
                },
                stroke: {
                    dashArray: 10
                },
                grid: {
                    padding: {
                        top: -20,
                        bottom: 5
                    }
                },
                states: {
                    hover: {
                        filter: {
                            type: 'none'
                        }
                    },
                    active: {
                        filter: {
                            type: 'none'
                        }
                    }
                },
                responsive: [
                    {
                        breakpoint: 1025,
                        options: {
                            chart: {
                                height: 330
                            }
                        }
                    },
                    {
                        breakpoint: 769,
                        options: {
                            chart: {
                                height: 280
                            }
                        }
                    }
                ]
            };
        if (typeof supportTrackerEl !== undefined && supportTrackerEl !== null) {
            const supportTracker = new ApexCharts(supportTrackerEl, supportTrackerOptions);
            supportTracker.render();
        }

    }
    $('#delete').on('click', () =>{
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this project!\n all related tasks will be deleted do you want to continue?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    let xhr = new XMLHttpRequest(); //creating xml object
                    xhr.open("POST", "actions/project-delete.php", true);
                    xhr.onload = ()=>{
                        if(xhr.readyState  === XMLHttpRequest.DONE)
                        {
                            if(xhr.status === 200)
                            {
                                let data = xhr.response;

                                if(data == "success")
                                {
                                    swal("Your project is deleted!", {
                                        icon: "success",
                                    }).then(()=>{
                                        location.href='index.php';
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
                    swal("Your project is not deleted!",{icon: "error"});
                }
            });
    });

    $('#edit').on('click', () => {
        location.href = 'project_edit.php';
    });

});

