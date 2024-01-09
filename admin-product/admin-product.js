document
    .getElementById("imageDropZone")
    .addEventListener("dragover", (event) => {
        event.stopPropagation();
        event.preventDefault();
        // Add styling or effects when dragging over
    });

document.getElementById("imageDropZone").addEventListener("drop", (event) => {
    event.stopPropagation();
    event.preventDefault();

    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];
        updateImage(file);
    }
});

var uploadedImage = null;

function updateImage(file) {
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("productImage").src = e.target.result;
        uploadedImage = file; // Store the uploaded image file
    };
    reader.readAsDataURL(file);
}

// create popup
document
    .getElementById("create-product")
    .addEventListener("click", function () {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("create-popup").style.display = "block";
    });

document
    .getElementById("close-create-popup")
    .addEventListener("click", function () {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("create-popup").style.display = "none";
    });

window.onclick = function (event) {
    if (event.target == document.getElementById("overlay")) {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("create-popup").style.display = "none";
    }
};

// delete popup
document
    .getElementById("delete-product")
    .addEventListener("click", function () {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("delete-popup").style.display = "block";
    });

document
    .getElementById("close-delete-popup")
    .addEventListener("click", function () {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("delete-popup").style.display = "none";
    });

window.onclick = function (event) {
    if (event.target == document.getElementById("overlay")) {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("delete-popup").style.display = "none";
    }
};
