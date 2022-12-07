<?php

session_start();

$page = 'Cadastro | Portal de Marketing';

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
            <h2>Realize seu cadastro no portal</h2>
            <input type="text" name="nome" placeholder="Insira seu nome completo" required>
            <input type="text" name="login" placeholder="Insira seu login" required>
            <input type="email" name="email" placeholder="Insira seu e-mail" required>
            <input type="password" name="pass" placeholder="Insira sua senha" required>
            <input type="password" name="cpass" placeholder="Confirme sua senha" required>
            <input type="submit" name="submit" value="Acessar a plataforma">
            <small>Já tem login? <a href="./login">Acesse aqui!</a></small>
        </form>
    </div>

</body>
</html>