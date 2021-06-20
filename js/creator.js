var background;
var frame_img;
var draggableElements;

addEventListener(onkeypress, moveFrameDown);

function AddText() {
    text = prompt("Please enter your text", "");

    if (text == null ||
        text.includes("<html>") ||
        text.includes("</html>") ||
        text.includes("<script>") ||
        text.includes("</script>") ||
        text.includes("<")) {
        text = "";
        return;
    }

    //context.font = "30px Calibri";
    var line = document.createElement("p");
    line.innerHTML = text;
    line.classList.add("draggable");
    line.style.fontSize = "20pt";
    line.style.fontFamily = "Arial";
    line.style.fontWeight = "Bold";
    if (typeof frame_img == 'undefined') {
        document.getElementById("card").appendChild(line);
    } else {
        document.getElementById("card").insertBefore(line, frame_img);
    }
    loadDrag();
}

function addFrame(frame_imgid) {
    if (typeof frame_img == 'undefined') {
        frame_img = document.createElement("img");
    }
    frame_img.src = "./creator/frames/frame" + frame_imgid + ".gif";
    frame_img.style.maxWidth = "500px";
    frame_img.style.height = "500px";
    frame_img.style.clipPath = "polygon(20% 40%, 86% 38%, 100% 100%, 0 100%)"
    document.getElementById("card").append(frame_img);
    loadDrag();
}

function addSticker(sticker) {
    var sticker_img = document.createElement("img");
    sticker_img.classList.add("draggable");
    sticker_img.src = "./creator/stickers/sticker" + sticker + ".png";
    if (typeof frame_img == 'undefined') {
        document.getElementById("card").appendChild(sticker_img);
    } else {
        document.getElementById("card").insertBefore(sticker_img, frame_img);
    }
    loadDrag();
}

function addBackground(backgroundid) {
    if (typeof background == 'undefined') {
        background = document.createElement("img");
    }
    background.src = "./creator/backgrounds/background" + backgroundid + ".png";
    document.getElementById("card").prepend(background);
    loadDrag();
}

function loadDrag() {
    draggableElements = document.getElementsByClassName("draggable");

    for (var i = 0; i < draggableElements.length; i++) {
        dragElement(draggableElements[i]);
        draggableElements[i].style.cursor = "pointer";
    }
};

function dragElement(elmnt) {
    var pos1 = 0,
        pos2 = 0,
        pos3 = 0,
        pos4 = 0;

    elmnt.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        pos3 = parseInt(e.clientX);
        pos4 = parseInt(e.clientY);
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
        return false;
    }

    function elementDrag(e) {
        e = e || window.event;
        pos1 = pos3 - parseInt(e.clientX);
        pos2 = pos4 - parseInt(e.clientY);
        pos3 = parseInt(e.clientX);
        pos4 = parseInt(e.clientY);
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        console.log(elmnt.offsetTop)
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.onmousemove = null;
        moveFrameUp();
    }
}

function moveFrameDown() {
    if (typeof frame_img != 'undefined') {
        var temp_frame = frame_img;
        frame_img.remove();
        background.parentNode.insertBefore(temp_frame, background.nextSibling);
        frame_img = temp_frame;
    }
    console.log("moved down");
}

function moveFrameUp() {
    if (typeof frame_img != 'undefined') {
        var temp_frame = frame_img;
        frame_img.remove();
        document.getElementById("card").append(frame_img);
        frame_img = temp_frame;
    }
    console.log("moved up");
}

function saveCanvas() {
    hiddenCanvas = document.getElementById("hiddenCanvas");
    hiddenContext = hiddenCanvas.getContext("2d");
    hiddenContext.font = "bold 30px arial";
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
            console.log(elements[i].innerHTML);
        }
    }

    var topimage = document.createElement("img");
    topimage.src = hiddenCanvas.toDataURL();
    document.getElementById("card").append(topimage);
}


function publish() {
    // var data = new FormData();
    // data.append('card', canvas.toDataURL());

    // var xmlhttp = new XMLHttpRequest();
    // xmlhttp.open("POST", "/publish.php");
    // xmlhttp.send(data);

    //    sessionStorage.setItem("card", canvas.toDataURL());
    download();
}

function download() {
    var a;
    a = document.getElementById("card").innerHTML;
    sessionStorage.setItem("text-html", a);
    console.log(sessionStorage.getItem('text-html'));
}

/*var canvas, context, hiddenCanvas, hiddenContext;
var star_img = new Image();
var text = new Image();
var isDraggable = false;
var isTextDraggable = false;

var currentX = 0;
var currentY = 0;
var currentTextX = 0;
var currentTextY = 0;
var background = new Image();
var frame_img = new Image();

var intermediary = new Image();

addEventListener('keydown', saveCanvas);

window.onload = function() {
    canvas = document.getElementById("canvas");
    context = canvas.getContext("2d");

    var rect = canvas.parentNode.getBoundingClientRect();
    canvas.width = rect.width;
    canvas.height = rect.height;

    currentX = canvas.width / 2;
    currentY = canvas.height / 2;

    currentTextX = canvas.width / 2;
    currentTextY = canvas.height / 2;
    var imagesLoaded = 0;


    star_img.onload = function() {
        //_Go();
    };
    text.onload = function() {
        //_Go();
    };
    background.onload = function() {
        //_Go();
    };
    frame_img.onload = function() {
        //_Go();
    };
    _Go();
    //star_img.src = "data:image/png;base64,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";
    //star_img.src = 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png';
    //star_img.src = "creator/stickers/sticker1.png";

    frame_img.src = "./creator/frames/frame6.png";
    //star_img.src = null; //'data:image/png;base64,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';
    text = "";
    background.src = "./creator/backgrounds/background1.png";
};

function _Go() {
    _MouseEvents();

    setInterval(function() {
        _ResetCanvas();
        _DrawImage();
    }, 1000 / 60);

}

function _ResetCanvas() {
    context.drawImage(background, 0, 0, canvas.width, canvas.height);
    context.drawImage(intermediary, 0, 0);

}

function _MouseEvents() {
    canvas.onmousedown = function(e) {

        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop - 100;

        // console.log("mousex:" + mouseX);
        // console.log("mousey:" + mouseY);


        if (mouseX >= (currentX - star_img.width / 2) &&
            mouseX <= (currentX + star_img.width / 2) &&
            mouseY >= (currentY - star_img.height / 2) &&
            mouseY <= (currentY + star_img.height / 2)) {
            isDraggable = true;
            //currentX = mouseX;
            //currentY = mouseY;
        } else if (mouseX >= (currentTextX - context.measureText(text).width / 2) &&
            mouseX <= (currentTextX + context.measureText(text).width / 2) &&
            mouseY >= (currentTextY - 20) &&
            mouseY <= (currentTextY + 20)) {
            isTextDraggable = true;
            //currentX = mouseX;
            //currentY = mouseY;
        }
    };
    canvas.onmousemove = function(e) {

        if (isDraggable) {
            currentX = e.pageX - this.offsetLeft;
            currentY = e.pageY - this.offsetTop - 100;
        }
        if (isTextDraggable) {
            currentTextX = e.pageX - this.offsetLeft;
            currentTextY = e.pageY - this.offsetTop - 100;
        }
    };
    canvas.onmouseup = function(e) {
        isDraggable = false;
        isTextDraggable = false;
    };
    canvas.onmouseout = function(e) {
        isDraggable = false;
        isTextDraggable = false;
    };
}

function _DrawImage() {
    context.drawImage(star_img, currentX - (star_img.width / 2), currentY - (star_img.height / 2));
    if (text)
        context.fillText(text, currentTextX - (context.measureText(text).width / 2), currentTextY + 5);
    context.drawImage(frame_img, 0, 0, canvas.width, canvas.height);

}

function AddText() {
    text = prompt("Please enter your text", "");
    context.font = "30px Calibri";
    console.log(context.measureText(text).height);
}

function addFrame(frame_imgid) {
    frame_img.src = "./creator/frames/frame" + frame_imgid + ".png";
    console.log(frame_img.src);
}

function addSticker(sticker) {
    star_img.src = "./creator/stickers/sticker" + sticker + ".png";
    console.log(sticker);
    console.log(star_img.src);
    currentX = canvas.width / 2;
    currentY = canvas.height / 2;
}

function addBackground(backgroundid) {
    background.src = "./creator/backgrounds/background" + backgroundid + ".png";
    //background.src = "./creator/backgrounds/background2.png";
    console.log(background.src);
}

function saveCanvas() {
    hiddenCanvas = document.getElementById("hiddenCanvas");
    hiddenContext = hiddenCanvas.getContext("2d");
    hiddenContext.font = "30px Calibri";

    //    hiddenContext.drawImage(background, 0, 0);
    hiddenContext.drawImage(star_img, currentX - (star_img.width / 2), currentY - (star_img.height / 2));
    if (text)
        hiddenContext.fillText(text, currentTextX - (hiddenContext.measureText(text).width / 2), currentTextY + 5);

    intermediary.src = hiddenCanvas.toDataURL();

    star_img.src = "";
    text = "";
    //console.log(background.src);
    //background.src.select();
    //document.execCommand("copy");
}

function publish() {
    // var data = new FormData();
    // data.append('card', canvas.toDataURL());

    // var xmlhttp = new XMLHttpRequest();
    // xmlhttp.open("POST", "/publish.php");
    // xmlhttp.send(data);

    sessionStorage.setItem("card", canvas.toDataURL());
    download();
}

function download() {
    var a;
    a = 
document.getElementById("card").innerHTML;
sessionStorage.setItem("text-html", a);
console.log(sessionStorage.getItem('text-html'));
} */