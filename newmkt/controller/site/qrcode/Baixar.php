<?php

    header('Content-Type: image/svg+xml'); // Ou o tipo MIME apropriado para o seu arquivo
    header('Content-Disposition: attachment; filename="qrcode.svg"'); // Define o nome do arquivo para download
    header('Content-Length: ' . strlen($_SESSION['qrcode'])); // Informa o tamanho do arquivo (opcional, mas recomendado)

    // Envia o conteúdo do arquivo para o navegador
    echo $_SESSION['qrcode'];

    exit; // Encerra o script após enviar o arquivo

?>