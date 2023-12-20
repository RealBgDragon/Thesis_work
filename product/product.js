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

function updateImage(file) {
    // Assuming the file is an image.
    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("productImage").src = e.target.result;
        // Here you can also implement the AJAX call to update the server
    };
    reader.readAsDataURL(file);
}
