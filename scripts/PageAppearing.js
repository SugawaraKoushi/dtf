const show = () => {
    let html = document.body;
    opacity = Number(window.getComputedStyle(html).getPropertyValue("opacity"));
    
    if (opacity < 1) {
        opacity += 0.1;
        html.style.opacity = opacity;
    } else {
        clearInterval(intervalID);
    }
}

const fadeIn = () => {
    setInterval(show, 30);
}

var opacity = 0;
var intervalID = 0;
window.onload = fadeIn;
