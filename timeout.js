var IdealTimeOut = 300; //3 minutes
var idleSecondsTimer = null;
var idleSecondsCounter = 0;
document.onclick = function () { idleSecondsCounter = 0; };
document.onmousemove = function () { idleSecondsCounter = 0; };
document.onkeypress = function () { idleSecondsCounter = 0; };
idleSecondsTimer = window.setInterval(CheckIdleTime, 1000);

function CheckIdleTime() {
    idleSecondsCounter++;
    var oPanel = document.getElementById("timeOut");
    if (oPanel) {
        oPanel.innerHTML = (IdealTimeOut - idleSecondsCounter);
    }
    if (idleSecondsCounter >= IdealTimeOut) {
        window.clearInterval(idleSecondsTimer);
        alert("Your session has expired. Please login again.");
        window.location = "http://localhost/loginpage.php";
    }
}