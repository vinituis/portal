<?php
var_dump($_POST);

if(isset($_POST['Id']) and $_POST['Id'] != null and isset($_POST['Metodo']) and $_POST['Metodo'] != null){
    $Met = $_POST['Metodo'];
    $Id = $_POST['Id'];

    switch($Met){
        case 'menus':
            $del = DB::delete("pages", array('id' => $Id, 'categoria' => 'navbar-item'));
            if($del == true){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Exclusão realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'grupos':
            $del = DB::delete("pages", array('id' => $Id, 'categoria' => 'menu-principal'));
            if($del == true){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Exclusão realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'conteudos':
            $del = DB::delete("conteudos", array('id' => $Id));
            if($del == true){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Exclusão realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'subgrupos':
            $del = DB::delete("pages", array('id' => $Id, 'categoria' => 'material'));
            if($del == true){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Exclusão realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'usuarios':
            $del = DB::delete("login", array('id' => $Id,));
            if($del == true){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Exclusão realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
    }
}else{
    $_POST['Id'] = null;
    $_POST['Metodo'] = null;
}

?>