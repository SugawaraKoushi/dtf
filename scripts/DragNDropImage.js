function onDragEnter(event) {
    event.preventDefault();
}

function onDragOver(event) {
    event.preventDefault();
}

function onDrop(event) {
    let dt = event.dataTransfer;
    let image = dt.files[0];
    let img = document.getElementById("profile-cover-image");

    let reader = new FileReader();
    reader.readAsDataURL(image);
    reader.onloadend = () => {
        img.src = reader.result;
    };
}
