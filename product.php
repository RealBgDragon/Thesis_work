<?php
require_once 'private/config_session.inc.php';
require_once 'private/product/product_contr.inc.php';
require_once 'private/product/product_view.inc.php';

$requestData = handleProductRequest();
if ($requestData) {
    $productData = $requestData['productData'];
    $admin = $requestData['admin'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="product/product.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <hr>
        <?php
        checkProductErrors();

        if (isset($productData) && isset($admin)) {
            productDisplay($productData, $admin);
        }
        ?>
        <div class="comments">
            <form action="" method='POST'>
                <input style='hidden' name='productId' type="text" class="text" value=<?php echo htmlspecialchars($_GET['product_id']); ?>>
                <input name='comment' type="text" class="text">
                <input type="submit" class="submit" value="submit comment">
            </form>
            <?php require_once 'reviews_view.inc.php'; ?>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>