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
require '../components/definir.php';

$menuPrincipalAdm->execute();
$itens = $menuPrincipalAdm->fetchAll(PDO::FETCH_OBJ);

$perm = $_SESSION['perm'];

// var_dump($_SESSION);

if(isset($_GET['state'])){
    $state = $_GET['state'];
    if($state == 'none'){
        header("location: ./home");
    }
}
if(isset($_GET['state'])){
    $state = $_GET['state'];
    if($state == 'none'){
        header("location: ./home");
    }
}


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
                        <h1 class="h2">Bem vindo(a)!</h1>
                        <div class="btn-group m-1 mb-0 mt-0">
                            
                        </div>
                    </div>
                </main>
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                
                    
                </tbody>
            </table>
        </div>
        

    </body>
</html>