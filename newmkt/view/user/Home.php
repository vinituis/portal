<?php require 'controller/user/Home.php'; ?>
<?php
if(isset($_GET['pgag']) and $_GET['pgag'] != null){
    $Page = $_GET['pgag'];
}else{
    $Page = 0;
}

?>
<?php require 'controller/user/components/Formatacao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<?php require 'components/Head.php'; ?>

    <body>

    <?php require 'components/Nav.php'; ?>

        <div class="container">
            <div class="row">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Bem vindo(a) <?php echo $_SESSION['loginNome']; ?>!</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            
                        </div>
                    </div>
                </main>
            </div>
            
            <?php echo Paginas('consultas', 5, $Page); ?>
    </body>
</html>