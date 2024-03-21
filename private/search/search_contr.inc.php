<?php
require_once 'Product.php';

class SearchController
{
    private $product;

    public function __construct($db)
    {
        $this->product = new Product($db);
    }

    public function search()
    {
        $query = isset ($_GET['search']) ? $_GET['search'] : '';

        if (!empty ($query)) {
            $results = $this->product->searchProducts($query);
            require_once 'search_view.php';
        } else {
            require_once 'search_view.php';
        }
    }

    public function getSuggestions()
    {
        $query = isset ($_GET['q']) ? $_GET['q'] : '';

        if (!empty ($query) && strlen($query) >= 3) {
            $suggestions = $this->product->getProductSuggestions($query);
            echo json_encode($suggestions);
        }
    }
}