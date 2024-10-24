<?php

session_start();

// inicio valida se está logado
if(isset($_SESSION['login'])){
    // echo $_SESSION['login'];
    if($_SESSION['login'] === true){
        // echo "AAAA";
    }else{
        header('location: ./');

    }
}else{
    header('location: ./');
}
// fim valida se está logado

require '../components/config.php';

$conteudosAdm->execute();
$itens = $conteudosAdm->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require '../components/head.php'; ?>

    <body>

    <?php require '../components/nav-admin.php'; ?>
        <div class="container">
            <div class="row">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Conteúdos</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group m-1 mb-0 mt-0">
                                <a href="adicionarC" class="btn btn-dark">Adicionar novo menu</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($itens as $item) {
                ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><a href="./editarC?id=<?php echo $item->id; ?>&met=conteudos"><?php echo $item->titulo; ?></a></td>
                        <td><?php echo $item->status; ?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>

    </body>
</html>