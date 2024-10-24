<?php

$domain = "http://localhost/";

date_default_timezone_set('America/Sao_Paulo');
try {
    $db = new PDO ('mysql:host=localhost;dbname=newmkt;charset=utf8', 'root', '');
    $menuPrincipal = $db->prepare("SELECT * FROM pages WHERE categoria = 'menu-principal' AND status = 'ativo' ORDER BY titulo ASC");
    $navbar = $db->prepare("SELECT * FROM pages WHERE categoria = 'navbar-item' AND status = 'ativo'");
    $materiais = $db->prepare("SELECT * FROM pages WHERE categoria = 'material' AND status = 'ativo'");

    // ADM
    $navbarAdm = $db->prepare("SELECT * FROM pages WHERE categoria = 'navbar-item-adm' AND status = 'ativo'");
    $menuPrincipalAdm = $db->prepare("SELECT * FROM pages WHERE categoria = 'menu-principal'");
    $materiaisAdm = $db->prepare("SELECT * FROM pages WHERE categoria = 'material'");
    $menusAdm = $db->prepare("SELECT * FROM pages WHERE categoria = 'navbar-item'");
    $conteudosAdm = $db->prepare("SELECT * FROM conteudos");
    $logins = $db->prepare("SELECT * FROM login");
    
} catch (PDOException $e) {

}

?>