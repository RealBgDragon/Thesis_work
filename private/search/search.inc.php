<?php
require_once 'search_contr.inc.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'search':
            search();
            break;
        case 'getSuggestions':
            getSuggestions();
            break;
    }
} else {
    search();
}