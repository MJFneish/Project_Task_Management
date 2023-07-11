$(function (){
    $('.toggle-switch').click( function(){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "actions/updateMode.php", true);
        xhr.onload= () =>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    
                    if(data === "light"){
                        $('body').removeClass('dark');
                        $('body').addClass('light');
                    }else if(data === "dark"){
                        $('body').removeClass('light');
                        $('body').addClass('dark');
                    }
                }
            }
        }
        xhr.send();
    });
})