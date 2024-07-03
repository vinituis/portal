<?php

session_start();

if(isset($_SESSION['qrcode'])){
    $qrcode = $_SESSION['qrcode'];
    $btn = '<a class="btn" href="./qrcode.svg" download>Baixar a imagem</a>';
    $link = $_SESSION['link'];
    $color = $_SESSION['color'];
}else{
    $qrcode = '';
    $btn = '';
    $link = '';
    $color = '';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de QRCode</title>
    <link rel="stylesheet" href="style.css">
    <meta name="robots" content="noindex">
    <link rel="icon" type="image/x-icon" href="./icon.svg">
</head>
<body>
    <div class="container">
        <div class="form">
            <h1>Gerador de QRCode</h1>
            <form action="teste.php" method="POST">
                <label for="link">Link</label>
                <input type="text" id="link" name="link" placeholder="Insira seu link aqui" value="<?php echo $link; ?>" required>
                <label for="color">Selecione a cor: </label><input type="color" id="color" name="color" placeholder="Insira a cor (Ex: #696969)" value="<?php echo $color; ?>" style="height: 3rem;">
                <select name="type" id="type">
                    <option value="SVG">SVG</option>
                </select>
                <input type="submit" name="submit" value="Enviar">
                <a href="./limpar.php">Limpar</a>
            </form>
        </div>
        <div class="qrcode">
            <?php 
                echo $qrcode;
                echo $btn;
            ?>

        </div>
    </div>

    
    
</body>
</html>