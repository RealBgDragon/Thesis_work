<?php
require_once 'search_model.inc.php';


function search()
{
    require_once '../dbh.inc.php';
    $query = isset ($_GET['search']) ? $_GET['search'] : '';

    if (!empty ($query)) {
        $results = searchProducts($pdo, $query);
        require_once '../../search_view.inc.php';
    } else {
        require_once '../../search_view.inc.php';
    }
}

function getSuggestions()
{
    require_once '../dbh.inc.php';
    $query = isset ($_GET['q']) ? $_GET['q'] : '';

    if (!empty ($query) && strlen($query) >= 3) {
        $suggestions = $product->getProductSuggestions($query);
        echo json_encode($suggestions);
    }
}
