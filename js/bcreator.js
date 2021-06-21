window.onload = (event) => { loadBusinessBkg() };

document.getElementById("card").addEventListener('mousemove', e => {
    var rect = e.target.getBoundingClientRect();
    console.log("x: " + (e.clientX - rect.left));
    console.log("y: " + (e.clientY - rect.top));
});

function loadBusinessBkg() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("picker").innerHTML = this.responseText;
            // console.log(this.responseText);
        }
    };
    xhttp.open("GET", "ajax/businessbackground.php", true);
    xhttp.responseType = "text";
    xhttp.send();
}


function placetext() {
    bCard = document.getElementById("card");
    uName = document.createElement("P");
    email = document.createElement("P");
    tel = document.createElement("p");
    addr = document.createElement("P");

    if (!(verify(uName.innerHTML) && verify(email.innerHTML) && verify(tel.innerHTML) && verify(addr.innerHTML))) {
        return;
    }

    //context.font = "30px Calibri";

    setConfig(uName);
    setConfig(email);
    setConfig(tel);
    setConfig(addr);
    // "nameField" type="text" name="name" placeholder="Name" Required>
    // <input id="emailField" type="email" name="email" placeholder="Email" Required>
    // <input id="telField" type="tel" name="phone" placeholder="Phone nr." Required>
    // <input id="addrField
    uName.innerHTML = document.getElementById("nameField").value;
    email.innerHTML = document.getElementById("emailField").value;
    tel.innerHTML = document.getElementById("telField").value;
    addr.innerHTML = document.getElementById("addrField").value;



    uName.style.top = "351px";
    uName.style.left = "85px";

    addr.style.top = "89px";
    addr.style.left = "370px";

    tel.style.top = "167px";
    tel.style.left = "370px";

    email.style.top = "226px";
    email.style.left = "370px";


    document.getElementById("card").appendChild(uName);
    document.getElementById("card").appendChild(addr);
    document.getElementById("card").appendChild(email);
    document.getElementById("card").appendChild(tel);

}

function setConfig(line) {
    //line.classList.add("draggable");
    line.style.fontSize = "15pt";
    line.style.fontFamily = "Arial";
    line.style.fontWeight = "Bold";
    line.style.textAlign = "right";
}

function verify(text) {
    if (text == null ||
        text.includes("<html>") ||
        text.includes("</html>") ||
        text.includes("<script>") ||
        text.includes("</script>") ||
        text.includes("<")) {
        text = "";
        return false;
    }
    return true;
}