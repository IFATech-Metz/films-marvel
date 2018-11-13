<?php

require_once('includes/header.php');

switch ($_SERVER['REQUEST_URI']) {

    case '/creation':
        require_once('pages/create.php');
        break;

    case '/description':
        require_once('pages/description.php');
        break;
        
    default:
        require_once('pages/index.php');
        break;
}

?>