<?php

if($method === 'GET'){
    if(isset($_SESSION['login']) and $_SESSION['login'] == true){
        switch ($caminho){
            case 'home':
                if($_SESSION['loginPerm'] == 10){
                    require "view/user/Home.php";
                    break;
                }else{
                    require "view/admin/Home.php";
                    break;
                }
            case 'menus':
                require "view/admin/Menus.php";
            break;
            case 'grupos':
                require "view/admin/Grupos.php";
            break;
            case 'conteudos':
                require "view/admin/Conteudos.php";
            break;
            case 'subgrupos':
                require "view/admin/Subgrupos.php";
            break;
            case 'editar':
                require "view/admin/Editar.php";
            break;
            case 'adicionar':
                require "view/admin/Adicionar.php";
            break;
            case 'usuarios':
                require "view/admin/Usuarios.php";
            break;
            case 'consultas':
                require "view/user/Consultas.php";
            break;
            case 'detalhe':
                require "view/user/Consulta.php";
            break;

            case 'sair':
                require "controller/admin/Sair.php";
            break;
        }

    }else{
        switch ($caminho){
            case 'home':
                require "view/site/Home.php";
            break;
            case 'categoria':
                require "view/site/Categoria.php";
            break;
            case 'post':
                require "view/site/Post.php";
            break;
            case 'login':
                require "view/site/Login.php";
            break;
            case 'qrcode':
                require "view/site/qrcode/Index.php";
            break;
            case 'b-qrcode':
                require "controller/site/qrcode/Baixar.php";
            break;
        }
    }
}

if($method === 'POST'){
    if(isset($_SESSION['login']) and $_SESSION['login'] == true){
        switch ($caminho){
            ///////////////// admin /////////////////
                
            case 'editar':
                require "controller/admin/Update.php";
            break;
            case 'excluir':
                require "controller/admin/Delete.php";
            break;
            case 'adicionar':
                require "controller/admin/Insert.php";
            break;
            case 'insert-image':
                require "controller/admin/components/InsertImg.php";
            break;
            case 'consultas':
                require "controller/user/Consultas.php";
            break;
        }
    }else{
        switch ($caminho){
            case 'login':
                require "controller/Login.php";
            break;
            case 'qrcode':
                require "controller/site/qrcode/Qrcode.php";
            break;
        }
    }
}

?>