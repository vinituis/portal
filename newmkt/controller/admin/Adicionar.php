<?php

if(isset($_GET['met']) and $_GET['met'] != null){
    $Met = $_GET['met'];

    require_once 'controller/admin/components/Inputs.php';
    
    switch ($Met) {
        case 'menus':
            $Campos = array('status', 'titulo', 'link');
        break;
        case 'grupos':
            $Campos = array('status', 'titulo', 'linkd', 'conteudo');
        break;
        case 'conteudos':
            $Campos = array('status', 'titulo', 'conteudo');
        break;
        case 'subgrupos':
            $Campos = array('status', 'titulo', 'referencia', 'linkS', 'conteudo');
        break;
    }
}
?>