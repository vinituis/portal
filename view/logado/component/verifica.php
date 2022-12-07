<?php

session_start();

if(!isset($_COOKIE['lembrar'])){
    header('location: ../login');
}

?>