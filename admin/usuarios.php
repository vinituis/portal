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

$logins->execute();
$users = $logins->fetchAll(PDO::FETCH_OBJ);

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
                        <h1 class="h2">Usuários</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group m-1 mb-0 mt-0">
                                <a href="./adicionarUs" class="btn btn-dark">Adicionar novo usuário</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="container">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Permissão</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php
                    foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->nome; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->depto; ?></td>
                        <td><?php echo $user->perm; ?></td>
                        <td><?php echo $user->status; ?></td>
                        <td>
                            <div class="btns">
                                <a href="./usuario?id=<?php echo $user->id?>" class="btn btn-primary">Ver detalhes</a>
                            </div>
                        </td>
                        
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        

    </body>
</html>