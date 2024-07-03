<?php 

require_once 'config.php';

?>

<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand position-absolute top-50 start-50 translate-middle" href="<?php echo $dominio; ?>">
        <img src="<?php echo $dominio; ?>/img/logo-colorido.png" alt="Logo" width="140" height="auto" class="d-inline-block align-text-top">
    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-3" id="navbarNavAltMarkup"></div>
    </div>
</nav>