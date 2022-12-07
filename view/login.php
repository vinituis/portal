<?php

session_start();

// if(isset($_COOKIE['lembrar'])){
//     header('location: ./logado/');
// }

$page = 'Login | Portal de Marketing';

if(isset($_POST['submit'])){
    var_dump($_POST);

    $login = $_POST['login'];

    
    if(isset($_POST['lembrar'])){
        if($_POST['lembrar'] == 'on'){
            setcookie('lembrar');
            setcookie('lembrar', 'true', time()+20);
            setcookie('login', $login, time()+20);
        }
    }else{
        setcookie('lembrar');
        setcookie('lembrar', 'false', time()+10);
        setcookie('login', $login, time()+10);
    }
    
    header('location: ./logado/');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '../component/head.php'; ?>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

    <?php include '../component/nav.php'; ?>

    <div class="container form">
        <form class="form-login" action="" method="post">
            <h2>Realize seu login no portal</h2>
            <input type="text" name="login" placeholder="Insira seu login" required>
            <input type="password" name="pass" placeholder="Insira sua senha" required>
            <div class="lembrar">
                <input type="checkbox" name="lembrar" id="lembrar">
                <label for="lembrar">Lembrar-me</label>
            </div>
            <input type="submit" name="submit" value="Acessar a plataforma">
            <small>Caso não tenha login, <a href="./cadastrar">solicite aqui!</a></small>
        </form>
    </div>

</body>
</html>