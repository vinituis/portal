<?php 

$perm = $_SESSION['perm'];

require 'config.php';

$navbarAdm->execute();
$itensNav = $navbarAdm->fetchAll(PDO::FETCH_OBJ);

?>

<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-flex" href="<?php echo $dominio; ?>/admin/home">
        <img src="<?php echo $dominio; ?>/img/logo-colorido.png" alt="Logo" width="140" height="auto" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <?php 
                if($perm >= 5){
                    echo "<a class='nav-link' aria-current='page' href='./home'>Home</a>";
                    echo "<a class='nav-link' aria-current='page' href='./sair'>Sair</a>";
                }else{
                    foreach ($itensNav as $itemNav) {
                        ?>
                            <a class="nav-link" aria-current="page" href="<?php echo $dominio.$itemNav->link; ?>"><?php echo $itemNav->titulo; ?></a>
                        <?php
                        }
                    }
                    if(isset($_SESSION['perm'])){
                        $permissao = $_SESSION['perm'];
                        switch ($permissao){
                            case '0':
                                echo "<a class='nav-link' aria-current='page' href='./usuarios'>Usuários</a>";
                                break;
                        }
                    }
                ?>
                
                <!-- <a class="nav-link" href="#">Menu 2</a>
                <a class="nav-link" href="#">Menu 3</a>
                <a class="nav-link disabled" aria-disabled="true">Menu 4 (desativado)</a> -->
            </div>
        </div>
    </div>
</nav>