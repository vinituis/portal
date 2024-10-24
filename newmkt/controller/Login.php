<?php

$_POST['senha'] = md5($_POST['email'].$_POST['senha']);
$Email = $_POST['email'];
$Senha = $_POST['senha'];
// var_dump($_POST);

$Req = DB::getUm("login", array(
    'where' => array(
        'email' => $Email,
        'pass' => $Senha,
    )
));

if($Req == false){
    // var_dump($Req);
    $_SESSION['login'] = false;
    $_SESSION['loginMsg'] = "<div class='alert alert-danger' role='alert'><b>Ocorreu um erro!</b><br>Seu e-mail ou senha estão incorretos.</div>";
    header('location: login');
}else{
    if($Req->status == "ativo"){
        $_SESSION['login'] = true;
        $_SESSION['loginNome'] = $Req->nome;
        $_SESSION['loginEmail'] = $Req->email;
        $_SESSION['loginDepto'] = $Req->depto;
        $_SESSION['loginPerm'] = $Req->perm;
        header('location: home');
    }else{
        $_SESSION['loginMsg'] = "<div class='alert alert-secondary' role='alert'><b>Seu login está bloqueado!</b><br>Entre em contato com o e-mail: marketing@abimaq.org.br</div>";
        $_SESSION['login'] = false;
        header('location: login');
    }
}


?>