<?php

header('Content-Type: application/json; charset=utf-8');

$targetDir = "../../website_image/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$uploadOk = 1;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    $data = [
        "success" => true,
        "image_url" => $targetFile
    ];
    $json = json_encode($data);
    echo $json;
} else {
    http_response_code(400); // Set the appropriate HTTP status code for a bad request
    echo json_encode([
        "success" => false,
        "error" => "Sorry, there was an error uploading your file."
    ]);
}

/* $json = json_encode($data);
if ($json === false) {
    // Avoid echo of empty string (which is invalid JSON), and
    // JSONify the error message instead:
    $json = json_encode(["jsonError" => json_last_error_msg()]);
    if ($json === false) {
        // This should not happen, but we go all the way now:
        $json = '{"jsonError":"unknown"}';
    }
    // Set HTTP response status code to: 500 - Internal Server Error
    http_response_code(500);
}
echo $json; */