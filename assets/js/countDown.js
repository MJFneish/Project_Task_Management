export default function countDown(countDownDate, completed) {
    var countDownTimer = setInterval(function() {

        let now = new Date().getTime();
        let diff = countDownDate - now;

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById("days").innerHTML = days  + ' days';
        document.getElementById("hours").innerHTML = hours + ' hours';
        document.getElementById("minutes").innerHTML = minutes + ' minutes';
        document.getElementById("seconds").innerHTML = seconds + ' seconds';
        console.log(completed);
        if(completed === 1 ) {
            clearInterval(countDownTimer);
            document.getElementById("days").innerHTML = "COMPLETED";
            document.getElementById("hours").innerHTML = "COMPLETED";
            document.getElementById("minutes").innerHTML = "COMPLETED";
            document.getElementById("seconds").innerHTML = "COMPLETED";
        } else if (diff <= 0) {
            clearInterval(countDownTimer);
            document.getElementById("days").innerHTML = "EXPIRED";
            document.getElementById("hours").innerHTML = "EXPIRED";
            document.getElementById("minutes").innerHTML = "EXPIRED";
            document.getElementById("seconds").innerHTML = "EXPIRED";
        }
    }, 1000);
}