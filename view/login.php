<?php

session_start();

$page = 'Login';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include '../component/head.php'; ?>
</head>
<body>

    <?php include '../component/nav.php'; ?>

    <form action="" method="post">
        <h2>Realize seu login no portal</h2>
        <input type="text" name="login" placeholder="Insira seu login" required>
        <input type="email" name="email" placeholder="Insira seu e-mail" required>
        <input type="submit" name="submit" value="Acessar">
    </form>

</body>
</html>