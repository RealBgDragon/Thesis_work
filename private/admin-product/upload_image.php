<?php

header('Content-Type: application/json; charset=utf-8');

$targetDir = "../../website_image/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if ($_FILES["image"]["size"] > 5000000) { // Example size limit: 500KB
    echo json_encode(["success" => false, "error" => "File is too large."]);
    die();
}

if (!in_array($fileType, ['jpg', 'png', 'jpeg', 'gif'])) { // Add or remove file types as needed
    echo json_encode(["success" => false, "error" => "Only JPG, JPEG, PNG & GIF files are allowed."]);
    die();
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}