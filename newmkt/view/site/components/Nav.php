<?php require_once 'controller/site/components/Nav.php'; ?>

<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand d-flex" href="home">
            <img src="src/img/logo-colorido.png" alt="Logo" width="140" height="auto" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php 
                    foreach ($Nav['res'] as $itemNav) {
                        if($itemNav->link == null){
                            echo "<a class='nav-link' aria-current='page' href='home'>$itemNav->titulo</a>";
                        }else{
                            echo "<a class='nav-link' aria-current='page' href='categoria?id=$itemNav->link'>$itemNav->titulo</a>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</nav>