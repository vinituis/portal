<?php
// var_dump($_POST);

$link = $_POST['link'];
$tipo = $_POST['tipo'];
$cor = $_POST['cor'];

$data = array(
    'frame_name' => 'no-frame',
    'qr_code_text' => $link,
    'image_format' => $tipo,
    'qr_code_logo' => '',
    'foreground_color' => $cor,
);

$url = 'https://api.qr-code-generator.com/v1/create?access-token=ZFjk6w-pRmjOEuQDui17eAMEoRshhBK3VVCHdfog1niENZTCfCCnhnZyJ4kVOzeQ';

$ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

    $result = curl_exec($ch);

    if ($result === false) {
        $_SESSION['qrcode'] = null;
        echo 'Erro cURL: ' . curl_error($ch);
        exit;
    }

curl_close($ch);

$_SESSION['qrcode'] = $result;

header('Location: qrcode');

?>