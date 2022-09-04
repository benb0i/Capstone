document.addEventListener("keydown", (event) => {
    var key = event.which || event.keyCode;
    if (key == 13) {
        var submitbutton = document.getElementById("submitbutton");
        submitbutton.click();
    }
}, false);

function validate() {
    var useremail = document.getElementById("useremail").value;
    var password = document.getElementById("password").value;
    if (useremail == "jacob" && password == "jacob") {
        alert("Succesfully Logged In!");
        window.open("homepage.html", '_self');
        return false;
    }
    else {
        alert("fail");
    }
}