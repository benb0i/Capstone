document.addEventListener("keydown", (event) => {
    var key = event.which || event.keyCode;
    if (key == 13) {
        var enterbutton = document.getElementById("enterbutton");
        enterbutton.click();
    }
}, false);

function validate() {
    alert("You've entered a ZIP Code");
    window.open("citypage.html", '_self');
    return false;
}