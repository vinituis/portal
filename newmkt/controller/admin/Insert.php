<?php

if(isset($_POST) and isset($_GET['met'])){
    var_dump($_POST);
    $Met = $_GET['met'];
    switch ($Met) {
        case 'menus':
            $Status = $_POST['status'];
            $Titulo = $_POST['titulo'];
            $Link = $_POST['link'];
            $Categoria = 'navbar-item';

            $insert = DB::insert("pages", array(
                'status' => $Status, 
                'titulo' => $Titulo, 
                'link' => $Link, 
                'categoria' => $Categoria,
                'ref' => 0,
                'conteudo' => '',
            ));
            if($insert[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Inserção realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'grupos':
            $Status = $_POST['status'];
            $Titulo = $_POST['titulo'];
            $Link = $_POST['link'];
            $Conteudo = $_POST['conteudo'];
            $Categoria = 'menu-principal';

            $insert = DB::insert("pages", array(
                'status' => $Status, 
                'titulo' => $Titulo, 
                'link' => $Link, 
                'categoria' => $Categoria,
                'ref' => 0,
                'conteudo' => $Conteudo,
            ));
            if($insert[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Inserção realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'conteudos':
            $Status = $_POST['status'];
            $Titulo = $_POST['titulo'];
            $Conteudo = $_POST['conteudo'];

            $insert = DB::insert("conteudos", array(
                'status' => $Status,
                'titulo' => $Titulo,
                'conteudo' => $Conteudo,
            ));
            if($insert[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Inserção realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'subgrupos':
            $Status = $_POST['status'];
            $Titulo = $_POST['titulo'];
            $Ref = $_POST['ref'];
            $Link = $_POST['link'];
            $Conteudo = $_POST['conteudo'];
            $Categoria = 'material';

            $insert = DB::insert("pages", array(
                'status' => $Status, 
                'titulo' => $Titulo, 
                'link' => $Link, 
                'categoria' => $Categoria,
                'ref' => $Ref,
                'conteudo' => $Conteudo,
            ));
            if($insert[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Inserção realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        case 'usuarios':
            $Status = $_POST['status'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $depto = $_POST['depto'];
            $perm = $_POST['perm'];
            $pass = md5($_POST['email'].$_POST['pass']);

            $insert = DB::insert("login", array(
                'status' => $Status, 
                'nome' => $nome,
                'email' => $email, 
                'pass' => $pass, 
                'depto' => $depto,
                'perm' => $perm,
            ));
            if($insert[0]['status'] == 1){
                $_SESSION['adminMsg'] = "<div class='alert alert-success' role='alert'><b>Inserção realizada!</b></div>";
                header("location: $Met");
            }else{
                $_SESSION['adminMsg'] = "<div class='alert alert-danger' role='alert'><b>Houve um erro!</b><br>Tente novamente mais tarde.</div>";
                header("location: $Met");
            }
        break;
        
    }
}

?>