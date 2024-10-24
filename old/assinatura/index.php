<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de assinatura</title>
    <link rel="stylesheet" href="./css/style.css">
    <meta name="robots" content="noindex">
</head>
<body>
    <div class="container">
        <form action="./assinatura.php" method="post">
            <h1>Gerador de assinatura</h1>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Ex: Fulana de Tal" required>
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="cargo" placeholder="Ex: Analista" required>
            <label for="tel">Telefone ABIMAQ</label>
            <input type="phone" name="telefone" id="tel" placeholder="Ex: (11) 5582-6666" required>
            <label for="cel">Celular ABIMAQ<br>(Este campo é destinado para pessoas que têm celular corporativo)</label>
            <!-- Inserir um descritivo sobre para quem é destinado este campo -->
            <input type="phone" name="celular" id="cel" placeholder="Ex: (11) 99999-9999">

            <select name="departamento" id="departamento" required>
                <option value="">Selecione seu departamento</option>
                <option value="DEAP">DEAP</option>
                <option value="DECG">DECG</option>
                <option value="DESA">DESA</option>
                <option value="DETI">DETI</option>
                <option value="DEAF">DEAF</option>
                <option value="DEMI">DEMI</option>
                <option value="DEEA">DEEA</option>
                <option value="DEEV">DEEV</option>
                <option value="DMKT">DMKT</option>
                <option value="DEFE">DEFE</option>
                <option value="DTEC">DTEC</option>
                <option value="DCAT">DCAT</option>
                <option value="DEME">DEME</option>
                <option value="DEPR">DEPR</option>
                <option value="DEFI">DEFI</option>
                <option value="CJTA">CJTA</option>
                <option value="CJCT">CJCT</option>
                <option value="DEEE">DEEE</option>
                <option value="PRE">PRE</option>
                <option value="CMEAG">CMEAG</option>
                <option value="CSAG">CSAG</option>
                <option value="CSBM">CSBM</option>
                <option value="CSEI">CSEI</option>
                <option value="CSHPA">CSHPA</option>
                <option value="CSGF">CSGF</option>
                <option value="CSENO">CSENO</option>
                <option value="CSEAG">CSEAG</option>
                <option value="CSGIN">CSGIN</option>
                <option value="CSMAM">CSMAM</option>
                <option value="CSVED">CSVED</option>
                <option value="CSFM">CSFM</option>
                <option value="CSFEI">CSFEI</option>
                <option value="CSMAIP">CSMAIP</option>
                <option value="CSMAT">CSMAT</option>
                <option value="CSCM">CSCM</option>
                <option value="CSMEG">CSMEG</option>
                <option value="CSMLIMP">CSMLIMP</option>
                <option value="CSMEM">CSMEM</option>
                <option value="CSMPAN">CSMPAN</option>
                <option value="CSMEPS">CSMEPS</option>
                <option value="CSMIA">CSMIA</option>
                <option value="CSMIAFRI">CSMIAFRI</option>
                <option value="CSMR">CSMR</option>
                <option value="CSAER">CSAER</option>
                <option value="CSDS">CSDS</option>
                <option value="CSMF">CSMF</option>
                <option value="CSMGG">CSMGG</option>
                <option value="CSPEP">CSPEP</option>
                <option value="CSTM">CSTM</option>
                <option value="CSVI">CSVI</option>
                <option value="CSQI">CSQI</option>
                <option value="GT-EM">GT-EM</option>
                <option value="GT-ELEVADORES">GT-ELEVADORES</option>
                <option value="GT-FUNDIÇÃO">GT-FUNDIÇÃO</option>
                <option value="GTGUINDASTES">GTGUINDASTES</option>
                <option value="GTMAV">GTMAV</option>
                <option value="GT-CIVIL">GT-CIVIL</option>
                <option value="GT-SOLDA">GT-SOLDA</option>
                <option value="GT-ENERGIA SOLAR">GT-ENERGIA SOLAR</option>
                <option value="SINDESAM">SINDESAM</option>
                <option value="SRMG">SRMG</option>
                <option value="SRPR">SRPR</option>
                <option value="SRSC">SRSC</option>
                <option value="SRNN">SRNN</option>
                <option value="SRPI">SRPI</option>
                <option value="SRRS">SRRS</option>
                <option value="SRRP">SRRP</option>
                <option value="SRRJ">SRRJ</option>
                <option value="SRVP">SRVP</option>
                <option value="RELGOV">RELGOV</option>
                <option value="SINDIMAQ">SINDIMAQ</option>
                <option value="COG">COG</option>
                <option value="IMPRENSA">IMPRENSA</option>
            </select>
            <div class="bms">
                <input type="checkbox" name="bms" id="bms">
                <label for="bms">Faz parte do BMS</label>
            </div>
            
            <input type="submit" name="submit" value="Gerar assinatura">

        </form>
    </div>
</body>
</html>