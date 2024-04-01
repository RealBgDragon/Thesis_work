<?php
require_once 'private/search/search_model.inc.php';
require_once 'private/search/search_view.inc.php';
require_once 'private/dbh.inc.php';
?>
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
    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="all-products/all-products.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php require ('header.php'); ?>

    <div id="search-results">
        <?php
        $query = $_GET['query'];
        $results = searchProducts($pdo, $query);
        renderSearchResults($results); ?>
    </div>

    <ul id="suggestions"></ul>

    <?php require ('footer.php'); ?>

    <script>
        $(document).ready(function () {
            $('#search').keyup(function () {
                var query = $(this).val();
                if (query.length >= 3) {
                    $.ajax({
                        url: 'search_contr.inc.php',
                        type: 'GET',
                        data: { action: 'getSuggestions', q: query },
                        success: function (data) {
                            var suggestions = JSON.parse(data);
                            $('#suggestions').empty();
                            $.each(suggestions, function (index, value) {
                                $('#suggestions').append('<li>' + value + '</li>');
                            });
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });
        });
    </script>
</body>

</html>