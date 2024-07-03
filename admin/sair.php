<?php

session_start();

$_SESSION['login'] = false;

echo $_SESSION['login'];

session_destroy();

header('location: ./');
?>