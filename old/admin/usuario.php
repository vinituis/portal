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

$UsId = $_GET['id'];

$users = $db->prepare("SELECT * FROM login WHERE id = '$UsId'");
$user = $users->execute();
$usu = $users->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['alterar'])){
    var_dump($_POST);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $depto = $_POST['depto'];
    $status = $_POST['status'];
    if(isset($_POST['perm'])){
        $perm = $_POST['perm'];
        $update = $db->prepare("UPDATE login SET nome = '$nome', email = '$email', depto = '$depto', perm = '$perm', status = '$status' WHERE id='$UsId'");
        $altera = $update->execute();
    }else{
        $update = $db->prepare("UPDATE login SET nome = '$nome', email = '$email', depto = '$depto', status = '$status' WHERE id='$UsId'");
        $altera = $update->execute();
    }

    if($altera){
        header("location: ./usuarios");
    }
}

foreach ($usu as $us) {

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require '../components/head.php'; ?>

    <body>

    <?php require '../components/nav-admin.php'; ?>
        <form action="" method="post">
            <div class="container">
                <div class="row">
                    <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Usuário #<?php echo $UsId;?></h1>
                        </div>
                    </main>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" placeholder="" value="<?php echo $us->nome;?>" name="nome">
                            <label for="nome">Nome</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="" value="<?php echo $us->email;?>" name="email">
                            <label for="email">E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="senha" placeholder=" " value="<?php echo $us->pass;?> " name="senha" readonly>
                            <label for="senha">Senha</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="depto" placeholder="" value="<?php echo $us->depto;?>" name="depto">
                            <label for="depto">Departamento</label>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <?php 
                        if($_SESSION['perm'] == 0){
                    ?>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="perm" aria-label="" name="perm">
                            <?php 
                                $permissoes = $db->prepare("SELECT * FROM pages WHERE categoria = 'perm'");
                                $pemissao = $permissoes->execute();
                                $perms = $permissoes->fetchAll(PDO::FETCH_OBJ);

                                foreach ($perms as $perm) {
                                    var_dump($perms);
                                    if($perm->link === $us->perm){
                                        echo "<option value='$perm->link' selected>$perm->titulo</option>";
                                    }else{
                                        echo "<option value='$perm->link'>$perm->titulo</option>";
                                    }
                            ?>
                            <?php
                                }
                            ?>
                            </select>
                            <label for="perm">Permissão</label>
                        </div>
                    </div>
                    <?php }else{} ?>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="status" aria-label="" name="status">
                                <option value="">Escolha o status</option>
                                <?php 
                                    if($us->status != "inativo"){
                                        echo "<option value='ativo' selected>Ativo</option>";
                                        echo "<option value='inativo' >Inativo</option>";
                                    }else{
                                        echo "<option value='inativo' selected>Inativo</option>";
                                        echo "<option value='ativo'>Ativo</option>";
                                    }
                                ?>
                                
                                
                            </select>
                            <label for="status">Status</label>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <button class="btn btn-dark mt-3" type="submit" name="alterar">Alterar</button>
                    <a class="btn" href="./usuarios">Cancelar</a>
                </div>
            </div>
        </form>
        

    </body>
</html>

<?php } ?>