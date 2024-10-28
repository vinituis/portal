<?php

if(isset($_GET['id']) and $_GET['id'] != null and isset($_GET['met']) and $_GET['met'] != null){
    $Met = $_GET['met'];
    $Id = $_GET['id'];

    switch ($Met) {
        case 'menus':
            // var_dump($_POST);
            $update = DB::update("pages", $_POST, array(
                'id' => $Id,
                'categoria' => 'navbar-item',
            ));
            if($update[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Alteração realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        
        case 'grupos':
            // var_dump($_POST);
            $update = DB::update("pages", $_POST, array(
                'id' => $Id,
                'categoria' => 'menu-principal',
            ));
            if($update[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Alteração realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        
        case 'conteudos':
            // var_dump($_POST);
            $update = DB::update("conteudos", $_POST, array(
                'id' => $Id,
            ));
            if($update[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Alteração realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;

        case 'subgrupos':
            // var_dump($_POST);
            $update = DB::update("pages", $_POST, array(
                'id' => $Id,
                'categoria' => 'material',
            ));
            if($update[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Alteração realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        
        default:
            # code...
            break;
    }





}else{
    echo "erro";
}


?>