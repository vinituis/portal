<?php

if($_POST['nome'] == null) {
    header('location: ./');
}else{
    // var_dump($_POST);
    if(isset($_POST['departamento'])) {
        $depto = $_POST['departamento'];
        require './deptos.php';
    } else {
        header('location: ./');
    }
    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assinatura</title>
    <meta name="robots" content="noindex">
    <style>
        * {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
                box-sizing: border-box;
        outline: none;
        /* border: none; */
        text-decoration: none;
        }
        p, h3 {
            margin: 5px;
        }
        p {
            font-size: 0.9rem;
        }
        p.small {
            font-size: 0.7rem;
        }
        .name {
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php if($_POST['departamento'] == "IMPRENSA"){ ?>
        <style>
            img { width: 350px; }
        </style>
        <p class="name"><?php echo $_POST['nome']; ?></p>
        <p><?php echo $_POST['cargo']; ?> | <?php echo $depto; ?></p>
        <p><?php if(isset($_POST['bms'])){ echo 'Brazil Machinery Solutions';} ?></p>
        <p><?php echo $_POST['telefone']; ?><?php if($_POST['celular'] === ''){}else{ echo ' | '.$_POST['celular']; } ?></p>
        <br>
        <img src="http://mkt.abimaq.org.br/assinatura/img/logo-horizontal-com-vervi.png" alt="Logo ABIMAQ e Vervi">
        <p>Saiba mais sobre a ABIMAQ, <a href="https://ig.rdstation.com/abimaqoficial" target="_blank">clicando aqui</a>.</p>
        <br>
        <p class="small">Esta mensagem (incluindo qualquer anexo) destina-se exclusivamente ao uso do destinatário e pode conter informações legalmente protegidas e confidenciais. Caso você tenha recebido por engano, pedimos que notifique o remetente imediatamente e, posteriormente, exclua esta mensagem do seu computador e servidor, pois a disseminação, encaminhamento, uso, impressão ou cópia do conteúdo desta mensagem são expressamente proibidos por quem não esteja autorizado pelo remetente.</p>
    <?php }else{ ?>
        <style>
            img { width: 200px; }
        </style>
        <p class="name"><?php echo $_POST['nome']; ?></p>
        <p><?php echo $_POST['cargo']; ?> | <?php echo $depto; ?></p>
        <p><?php if(isset($_POST['bms'])){ echo 'Brazil Machinery Solutions';} ?></p>
        <p><?php echo $_POST['telefone']; ?><?php if($_POST['celular'] === ''){}else{ echo ' | '.$_POST['celular']; } ?></p>
        <br>
        <img src="http://mkt.abimaq.org.br/assinatura/img/logo-horizontal-cor.png" alt="Logo ABIMAQ">
        <p>Saiba mais sobre a ABIMAQ, <a href="https://ig.rdstation.com/abimaqoficial" target="_blank">clicando aqui</a>.</p>
        <br>
        <p class="small">Esta mensagem (incluindo qualquer anexo) destina-se exclusivamente ao uso do destinatário e pode conter informações legalmente protegidas e confidenciais. Caso você tenha recebido por engano, pedimos que notifique o remetente imediatamente e, posteriormente, exclua esta mensagem do seu computador e servidor, pois a disseminação, encaminhamento, uso, impressão ou cópia do conteúdo desta mensagem são expressamente proibidos por quem não esteja autorizado pelo remetente.</p>
    <?php } ?>
</body>
</html>
