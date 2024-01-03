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
