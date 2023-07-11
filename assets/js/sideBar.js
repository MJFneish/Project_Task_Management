$(function(){
    $('.toggle').on('click', ()=> {
        let close = $('.sidebar').hasClass('close');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/toggleOpenCloseSideBar.php", true);
        xhr.onload= () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;

                    if(data === "success"){
                        $('.sidebar').toggleClass('close');
                    }else{
                        console.log(data);
                    }
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send('close='+close);
    });


})

