var xmlImported = false;
var bCard;
var xmlData;

window.onload = (event) => { loadBusinessBkg() };

document.getElementById("card").addEventListener('mousemove', e => {
    //var rect = e.target.getBoundingClientRect();
    //console.log("x: " + (e.clientX - rect.left));
    //console.log("y: " + (e.clientY - rect.top));
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
    website = document.createElement("P");

    if (!(verify(uName.innerHTML) && verify(email.innerHTML) && verify(tel.innerHTML) && verify(addr.innerHTML) && verify(website.innerHTML))) {
        return;
    }

    //context.font = "30px Calibri";

    setConfig(uName);
    setConfig(email);
    setConfig(tel);
    setConfig(addr);
    setConfig(website);
    // "nameField" type="text" name="name" placeholder="Name" Required>
    // <input id="emailField" type="email" name="email" placeholder="Email" Required>
    // <input id="telField" type="tel" name="phone" placeholder="Phone nr." Required>
    // <input id="addrField
    uName.innerHTML = document.getElementById("nameField").value;
    email.innerHTML = document.getElementById("emailField").value;
    tel.innerHTML = document.getElementById("telField").value;
    addr.innerHTML = document.getElementById("addrField").value;
    website.innerHTML = document.getElementById("siteField").value;


    uName.style.top = "351px";
    uName.style.left = "85px";

    addr.style.top = "89px";
    addr.style.left = "370px";

    tel.style.top = "167px";
    tel.style.left = "370px";

    email.style.top = "226px";
    email.style.left = "370px";

    website.style.top = "298px";
    website.style.left = "370px";


    document.getElementById("card").appendChild(uName);
    document.getElementById("card").appendChild(addr);
    document.getElementById("card").appendChild(email);
    document.getElementById("card").appendChild(tel);
    document.getElementById("card").appendChild(website);

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

function saveBCard() {
    var params;
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open("POST", "ajax/addbcard.php");
    xhr.onreadystatechange = function() {
        if (xhr.readyState > 3 && xhr.status == 200) {
            //console.log(xhr.responseText);
            window.location.href = "./bcardviewer.php?id=" + xhr.responseText;
        }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    saveCanvas();
    if (xmlImported) {
        params = "xml=" + xmlData + '&';
    } else {
        params = "xml=&card=" + encodeURIComponent(bCard);
    }

    xhr.send(params);
}



function saveCanvas() {
    hiddenCanvas = document.getElementById("hiddenCanvas");
    hiddenContext = hiddenCanvas.getContext("2d");
    hiddenContext.font = "bold 15pt arial";
    hiddenContext.textBaseline = "top";

    greetingCard = document.getElementById("card");
    var elements = greetingCard.querySelectorAll(".card > *");

    hiddenContext.drawImage(elements[0], 0, 0, hiddenCanvas.width, hiddenCanvas.height);
    console.log("put element " + elements[0].src + " at " + 0 + " and " + 0);

    for (let i = 1; elements[i]; i++) {
        var pos1 = (elements[i].offsetLeft);
        var pos2 = (elements[i].offsetTop);

        if (elements[i].tagName == 'IMG') {

            hiddenContext.drawImage(elements[i], pos1, pos2);
            //console.log("put element " + elements[i].src + " at " + pos1 + " and " + pos2);
        } else if (elements[i].tagName == 'P') {
            hiddenContext.fillText(elements[i].innerHTML, pos1, pos2);
            //console.log(elements[i].innerHTML);
        }
    }
    bCard = hiddenCanvas.toDataURL();
    //var topimage = document.createElement("img");
    //topimage.src = hiddenCanvas.toDataURL();
    //document.getElementById("card").append(topimage);
}