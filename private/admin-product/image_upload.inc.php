<?php
// Directory where uploaded images are saved
$targetDir = "../../website_images/";
// Specify the path for the uploaded image
$targetFile = $targetDir . basename($_FILES["image"]["name"]);


if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";

} else {
    echo "Sorry, there was an error uploading your file.";
}