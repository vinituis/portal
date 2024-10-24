<?php

session_start();

require '../components/config.php';

$menuPrincipalAdm->execute();
$itens = $menuPrincipalAdm->fetchAll(PDO::FETCH_OBJ);

if(isset($_SESSION['login'])){
    if($_SESSION['login'] == true){
        echo "AAAA";
        header('location: ./valida');
    }else{}
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require '../components/head.php'; ?>

    <body>

    <?php require '../components/no-nav.php'; ?>

    <div class="container">
        <div class="row m-5">
            <form action="./valida.php" method="post">
                <h1 class="pb-3">Login</h1>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">E-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                </div>
            </form>
        </div>
    </div>

    </body>
</html>