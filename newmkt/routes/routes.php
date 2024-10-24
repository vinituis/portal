<?php

if($method === 'GET'){
    if(isset($_SESSION['login']) and $_SESSION['login'] == true){
        switch ($caminho){
            case 'home':
                require "view/admin/Home.php";
            break;
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
        }
    }
}

if($method === 'POST'){
    switch ($caminho){
        case 'login':
            require "controller/Login.php";
        break;
    }
}

?>