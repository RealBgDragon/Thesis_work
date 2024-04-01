document.addEventListener("DOMContentLoaded", (event) => {
    // Your script here
    document
        .getElementById("imageDropZone")
        .addEventListener("dragover", function (e) {
            e.preventDefault(); // Prevent default behavior
        });

    document
        .getElementById("imageDropZone")
        .addEventListener("drop", function (e) {
            e.preventDefault();
            if (e.dataTransfer.files.length) {
                document.getElementById("imageFile").files =
                    e.dataTransfer.files;
                const file = e.dataTransfer.files[0];
                updateImagePreview(file);
            }
        });

    function updateImagePreview(file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const displayedImage = document.getElementById("displayedImage");
            if (displayedImage) {
                // Check if the element exists
                displayedImage.src = e.target.result;
            } else {
                console.error("Element with ID displayedImage not found");
            }
        };
        reader.readAsDataURL(file);
    }

    document
        .getElementById("imageDropZone")
        .addEventListener("click", function () {
            document.getElementById("imageFile").click();
        });

    document
        .getElementById("imageFile")
        .addEventListener("change", function () {
            if (this.files.length) {
                updateImagePreview(this.files[0]);
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

//success window
document.addEventListener("DOMContentLoaded", (event) => {
    if (document.querySelector(".update-success")) {
        setTimeout(function () {
            document.querySelector(".update-success").style.display = "none";
            document.body.classList.remove("body-with-update");
        }, 5000);
        document.body.classList.add("body-with-update");
    }
});
