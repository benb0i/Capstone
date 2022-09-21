document.addEventListener("keydown", (event) => {
    var key = event.which || event.keyCode;
    if (key == 13) {
        var enterbutton = document.getElementById("enterbutton");
        enterbutton.click();
    }
}, false);

function validate() {
    var zipvalue = document.getElementById("searchbarinput").value;
    localStorage.setItem("textvalue", zipvalue);
    window.open("citypage.html", '_self');
    return false;
}