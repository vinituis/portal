<?php

session_start();

if(isset($_POST['submit'])){
    $link = $_POST['link'];
    $type = $_POST['type'];
    $color = $_POST['color'];
    
    $dadosParaEnviar = http_build_query(
        array(
            'frame_name' => 'no-frame',
            'qr_code_text' => $link,
            'image_format' => $type,
            'qr_code_logo' => '',
            'foreground_color' => $color,
        )
    );
    
    $opcoes = array('http' =>
           array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $dadosParaEnviar
        )
    );
    
    $contexto = stream_context_create($opcoes);
    $result   = file_get_contents('https://api.qr-code-generator.com/v1/create?access-token=ZFjk6w-pRmjOEuQDui17eAMEoRshhBK3VVCHdfog1niENZTCfCCnhnZyJ4kVOzeQ', $dadosParaEnviar, $contexto);

}else {
    $result = '';
    header('location: ./');
}

$_SESSION['qrcode'] = $result;
$_SESSION['link'] = $link;
$_SESSION['color'] = $color;

file_put_contents('qrcode.svg', $result);

header('location: ./');

?>