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

var_dump($_POST);

if(isset($_POST['criar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $depto = $_POST['depto'];
    $perm = $_POST['perm'];
    $senha;
    $status = 'ativo';

    $num = rand();
    echo $num;
    $senha = md5($num);
    echo "<br>";
    echo $senha;

    $users = "INSERT INTO login (nome, email, pass, depto, perm, status) VALUES (?, ?, ?, ?, ?, ?)";
    $db->prepare($users)->execute([$nome, $email, $senha, $depto, $perm, $status]);

    $arq = "<style type='text/css'>
        body {
            margin:0;
            font-family: Verdana, sans-serif;
            font-size: 12px;
            color: #808080;
        }
        p {
            font-size: 12px;
        }
        a {
            color: #666;
            font-size: 12px;
        }
        table {
            margin: 25px;
        }
        a:hover {
            color: #005;
            text-decoration: none;
        }
        </style>

        <html>
            <table width='510' border='0' cellpadding='10' bgcolor='#fff'>
                <tr>
                    <td>
                        <p>Olá $nome,</p>
                        <p>O seu login de usuário foi criado em nosso portal de marketing.</p>
                        <p>Para acessa-lo, basta <a href='http://mkt.abimaq.org.br/admin'>clicar aqui</a>.</p>
                        <br>
                        <p><b>Suas credenciais para acesso:</b></p>
                        <p><b>Login: </b>$email</p>
                        <p><b>Senha: </b>$num</p>
                        <br>
                        <p>ABIMAQ - Associação Brasileira da Indústria de Máquinas e Equipamentos</p>
                    </td>
                </tr>
            </table>
        </html>";

        // echo $arq;
    $emailenviar = 'marketing@abimaq.org.br';
    $destino = $email;
    $assunto = 'Login do Portal de Marketing da ABIMAQ';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Marketing da ABIMAQ <$email>';

    $enviaremail = mail($destino, $assunto, $arq, $headers);

    if($enviaremail){
        $mgm = '<span style="display: flex;width: 100%;align-items: center;justify-content: center;font-size: 1.2rem;padding: 1.5rem 0;">Senha enviada para o e-mail cadastrado</span>';
        echo $mgm;
    }else{
        $mgm = '<span style="display: flex;width: 100%;align-items: center;justify-content: center;font-size: 1.2rem;padding: 1.5rem 0;">Ops... Não conseguimos enviar o e-mail de com a senha!';
        echo $mgm . '<br>';
        echo 'A senha é esta: '.$num.'</span>';
    }
}

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
                            <h1 class="h2">Adicionar novo usuário<?php echo $_SESSION['perm']; ?></h1>
                        </div>
                    </main>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" placeholder="" name="nome">
                            <label for="nome">Nome</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                            <label for="email">E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="depto" placeholder="" name="depto">
                            <label for="depto">Departamento</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="perm" aria-label="" name="perm">
                            <?php
                                $permissoes = $db->prepare("SELECT * FROM pages WHERE categoria = 'perm'");
                                $pemissao = $permissoes->execute();
                                $perms = $permissoes->fetchAll(PDO::FETCH_OBJ);

                                foreach ($perms as $perm) {
                                    if($_SESSION['perm'] == 0){
                                        echo "<option value='$perm->link'>$perm->titulo</option>";
                                    }else{
                                        if($perm->link == 0){}else{
                                            echo "<option value='$perm->link'>$perm->titulo</option>";
                                        }
                                    }
                            ?>
                            <?php
                                }
                            ?>
                            </select>
                            <label for="perm">Permissão</label>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto">
                    <button class="btn btn-dark mt-3" type="submit" name="criar">Criar usuário</button>
                    <a class="btn" href="./usuarios">Cancelar</a>
                </div>
            </div>
        </form>
        

    </body>
</html>