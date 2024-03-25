<?php

try {
    $comment = $_POST['comment'];
    $userId = $_SESSION['userId'];
    $productId = $_POST['productId'];
    $rating = $_POST['rating'];

    require_once 'review_contr.inc.php';
    require_once 'review_view.inc.php';
    require_once 'review_model.inc.php';
    require_once '../dbh.inc.php';

    $errors = [];

    require_once '../config_session.inc.php';

    if (isCommentSet($comment)) {
        $_SESSION['commentError'] = 'Please add text to the review';
    }

    if ($errors) {
        $_SESSION['commentError'] = $errors;

        header('Location: ../../product.php?product_id=' . $productId);
        die();
    }

    addReview($pdo, $productId, $userId, $rating, $comment);
    header('Location: ../../register.php?product_id=' . $productId . 'success=Comment posted successfully');

    $pdo = null;
    $stmt = null;

    die();
} catch (Exception $e) {

    $errors['connectionError'] = 'Connection error! Please try again later!';
    $_SESSION['commentError'] = $errors;
    header("Location: ../../register.php");
}