document.addEventListener("DOMContentLoaded", (event) => {
    document
        .getElementById("imageDropZone")
        .addEventListener("dragover", (event) => {
            console.log("Drag over detected");
            event.stopPropagation();
            event.preventDefault();
            event.dataTransfer.dropEffect = "copy"; // Show as a copy action on drag over
        });
});

function updateImage(file) {
    if (!file) {
        return;
    }

    let reader = new FileReader();

    reader.onload = function (event) {
        let dataUrl = event.target.result;

        let imagePreview = document.getElementById("image_url");
        imagePreview.src = dataUrl;
    };

    reader.readAsDataURL(file);
}

document.addEventListener("DOMContentLoaded", (event) => {
    document
        .getElementById("imageDropZone")
        .addEventListener("drop", (event) => {
            event.stopPropagation();
            event.preventDefault();

            const files = event.dataTransfer.files;
            if (files.length > 0) {
                const file = files[0];
                updateImage(file); // This function updates the image preview

                // New code to upload the image to the server
                const formData = new FormData();
                formData.append("image", file); // 'image' is the key

                fetch("./private/admin-product/upload_image.php", {
                    method: "POST",
                    body: formData,
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Network response was not ok");
                        }
                        return response.json();
                    })
                    .then((data) => {
                        if (data.success) {
                            // If the server responded with success, update the hidden input's value
                            document.getElementById("image_url").value =
                                data.image_url;
                        } else {
                            // Handle upload failure
                            console.error("Upload failed:", data.error);
                        }
                    })
                    .catch((error) => console.error("Error:", error));
                /* .then((response) => response.json()) // Assuming the server responds with JSON
                    .then((data) => {
                        if (data.success) {
                            // If the server responded with success, update the hidden input's value
                            document.getElementById("image_url").value =
                                data.image_url;
                        } else {
                            // Handle upload failure
                            console.error("Upload failed:", data.error);
                        }
                    })
                    .catch((error) => console.error("Error:", error)); */
            }
        });
});
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

// Selecting product
document.addEventListener("DOMContentLoaded", function () {
    var currentProductId = document.getElementById("product_id").value;

    var selectElement = document.getElementById("productSelect");
    if (selectElement) {
        selectElement.value = currentProductId; // Set the default selected option

        selectElement.addEventListener("change", function () {
            var productId = this.value;
            window.location.href = "admin-product.php?product_id=" + productId;
        });
    } else {
        console.log("Error: Select element not found"); // Debugging line
    }
});
