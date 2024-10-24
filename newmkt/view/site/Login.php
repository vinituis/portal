<!DOCTYPE html>
<html lang="pt-br">

<?php require 'components/head.php'; ?>

    <body>

    <nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
        <a class="navbar-brand position-absolute top-50 start-50 translate-middle" href="home">
            <img src="src/img/logo-colorido.png" alt="Logo" width="140" height="auto" class="d-inline-block align-text-top">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-3" id="navbarNavAltMarkup"></div>
        </div>
    </nav>

    <div class="container">
        <div class="row m-5">
            <form action="" method="post">
                <h1 class="pb-3">Login</h1>
                <?php
                    if(isset($_SESSION['loginMsg']) and $_SESSION['loginMsg'] != null){
                        echo $_SESSION['loginMsg'];
                        $_SESSION['loginMsg'] = null;
                    }
                ?>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">E-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
            </form>
        </div>
    </div>

    </body>
</html>