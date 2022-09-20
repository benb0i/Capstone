document.addEventListener("keydown", (event) => {
    var key = event.which || event.keyCode;
    if (key == 13) {
        var enterbutton = document.getElementById("enterbutton");
        enterbutton.click();
    }
}, false);

function submitzip() {
    var zipcode = document.getElementById("searchbarinput").value;
    alert("You've entered the ZIP Code: " + zipcode);
    window.open("citypage.html", '_self');
    return false;
}