<?php 

function definir($t) {
    switch ($t) {
        case 'menu-principal':
            echo "Grupo";
            break;
        case 'navbar-item':
            echo "Menu";
            break;
        case 'material':
            echo "Subgrupo";
            break;
        default:
            echo "Não identificado";
    }
} 

function nomearStatus($status){
    switch ($status) {
        case '0':
            $status = "Novo Ticket";
            return $status;
            break;
        case '1':
            $status = "Em produção";
            return $status;
            break;
        case '2':
            $status = "Pendente";
            return $status;
            break;
        case '3':
            $status = "Finalizado";
            return $status;
            break;
        case '4':
            $status = "Cancelado";
            return $status;
            break;
        default:
            $status = "Error";
            return $status;
            break;
    }
}

function defineStatus($st) {
    switch ($st) {
        case '0':
            $st = "text-bg-info";
            return $st;
            break;
        case '1':
            $st = "text-bg-primary";
            return $st;
            break;
        case '2':
            $st = "text-bg-warning";
            return $st;
            break;
        case '3':
            $st = "text-bg-success";
            return $st;
            break;
        case '4':
            $st = "text-bg-danger";
            return $st;
            break;
        default:
            $st = "text-bg-danger";
            return $st;
            break;
    }
}

function defineData($dataC) {
    // echo $dataC;
    $datahora = explode("|", $dataC);
    $data = explode("-", $datahora[0]);
    $hora = $datahora[1];
    // var_dump($data);
    $dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];

    echo $dia."/".$mes."/".$ano." às ".$hora;
}

function defineDataEvento($date) {
    $dataC = explode("|", $date);
    // var_dump($dataC);
    $data = explode("-", $dataC[0]);
    $ano = $data[0];
    $mes = $data[1];
    $dia = $data[2];
    return $dia."/".$mes."/".$ano." das ".$dataC[1]." às ".$dataC[2];
}

function emailParaNome($id) {
    require "config.php";

    $d = $id;
    $sql = $db->prepare("SELECT * FROM login WHERE email = '$d'");
    $sqli = $sql->execute();

    $donos = $sql->fetchAll(PDO::FETCH_OBJ);

    foreach($donos as $dono){
        return $dono->nome;
    }
}

function opcaoStatus() {
    echo "<option value='0'>Novo</option>";
    echo "<option value='1'>Em produção</option>";
    echo "<option value='2'>Pendente</option>";
    echo "<option value='3'>Finalizado</option>";
    echo "<option value='4'>Cancelado</option>";
}

?>