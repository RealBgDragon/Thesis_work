<!DOCTYPE html>
<html>

<head>
    <title>Product Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var query = $(this).val();
                if (query.length >= 3) {
                    $.ajax({
                        url: 'search.php?action=getSuggestions&q=' + query,
                        type: 'GET',
                        dataType: 'json',
                        success: function (suggestions) {
                            var suggestionsList = $('#suggestions');
                            suggestionsList.empty();
                            $.each(suggestions, function (index, suggestion) {
                                suggestionsList.append('<li>' + suggestion + '</li>');
                            });
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });
        });
    </script>
</head>

<body>
    <form action="search.php?action=search" method="get" class="search-bar">
        <input type="search" placeholder="Search for products..." name="search" id="search">
        <button type="submit">Search</button>
    </form>
    <ul id="suggestions"></ul>

    <?php if (isset ($results) && !empty ($results)): ?>
        <h2>Search Results</h2>
        <ul>
            <?php foreach ($results as $product): ?>
                <li>
                    <h3>
                        <?php echo $product['name']; ?>
                    </h3>
                    <p>Model:
                        <?php echo $product['model']; ?>
                    </p>
                    <p>Brand:
                        <?php echo $product['brand']; ?>
                    </p>
                    <p>Price:
                        <?php echo $product['price']; ?>
                    </p>
                    <p>Description:
                        <?php echo $product['description']; ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>