<?php

session_start();

require 'vendor/autoload.php';
 
use Models\Database;
 
new Database();


if(isset($_SERVER['PATH_INFO'])) {
    $route = substr($_SERVER['PATH_INFO'], 1);

    switch($route) {
        case 'register':
            require_once('views/register.php');
            break;
        case 'login':
            require_once('views/login.php');
            break;
        case 'download':
            require_once('views/download.php');
            break;
        default:
            echo "404";
            break;
    }
} else {
    require_once('views/download.php');
}