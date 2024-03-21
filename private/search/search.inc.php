<?php
require_once 'SearchController.php';

if (isset ($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'search':
            $searchController->search();
            break;
        case 'getSuggestions':
            $searchController->getSuggestions();
            break;
    }
} else {
    $searchController->search();
}