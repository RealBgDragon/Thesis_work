<!DOCTYPE html>
<html>

<head>
    <title>Product Search</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon" type="image/x-icon" href="global-images/icon.png" />
    <link rel="stylesheet" href="../../global.css" />
    <link rel="stylesheet" href="../../all-products/all-products.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php require ('../../header.php') ?>
    <ul id="suggestions"></ul>

    <?php if (isset ($results) && !empty ($results)): ?>
        <h2>Search Results</h2>
        <?php foreach ($results as $product): ?>
            <div class="item">
                <img src="../../<?php echo $product['image_url']; ?>" alt="">
                <div class="info">
                    <input type="text" class="name" value="<?php echo htmlspecialchars($product['name']); ?>" readonly>
                    <input type="text" class="model" value="<?php echo htmlspecialchars($product['model']); ?>" readonly>
                    <input type="text" class="brand" value="<?php echo htmlspecialchars($product['brand']); ?>" readonly>
                    <input type="text" class="price" value="<?php echo htmlspecialchars($product['price']); ?>" readonly>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php require ('../../footer.php') ?>
</body>

</html>