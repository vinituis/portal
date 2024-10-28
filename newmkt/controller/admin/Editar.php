<?php

if(isset($_GET['id']) and $_GET['id'] != null and isset($_GET['met']) and $_GET['met'] != null){
    $Met = $_GET['met'];
    $Id = $_GET['id'];
    require_once 'controller/admin/components/Inputs.php';

    switch ($Met) {
        case 'menus':
            $Req = DB::getUm("pages", array('where' => array('categoria' => 'navbar-item', 'id' => $Id)));
            $Campos = array('status', 'titulo', 'link');
        break;
        case 'grupos':
            $Req = DB::getUm("pages", array('where' => array('categoria' => 'menu-principal', 'id' => $Id)));
            $Campos = array('status', 'titulo', 'linkd', 'conteudo');
        break;
        case 'conteudos':
            $Req = DB::getUm("conteudos", array('where' => array('id' => $Id)));
            $Campos = array('status', 'titulo', 'conteudo');
        break;
        case 'subgrupos':
            $Req = DB::getUm("pages", array('where' => array('categoria' => 'material', 'id' => $Id)));
            $Campos = array('status', 'titulo', 'referencia', 'linkS', 'conteudo');
        break;
        }    

}else{
    echo "erro";
}

?>