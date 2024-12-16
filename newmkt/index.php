<?php
session_start();
// phpinfo();
date_default_timezone_set("America/Sao_Paulo");

$projeto = 'newmkt';

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// echo "AAAA";
// var_dump($_GET['path']);

if (isset($_GET['path'])) {
    $path = explode("/", $_GET['path']);
    $caminho = $path[0];
} else { 
    $caminho = 'home';
}


include_once "./model/db.class.php";
include_once "./routes/routes.php";