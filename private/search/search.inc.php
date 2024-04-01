<?php
require_once 'search_model.inc.php';
require_once 'search_view.inc.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'search';

$query = isset($_GET['search']) ? $_GET['search'] : '';
header('Location: ../../search.php?query=' . $query);
