<?php

$data = array('titulo' => $_POST['titulo'], 
'dateini' => $_POST['dateini'], 
'dateend' => $_POST['dateend'], 
'horaini' => $_POST['horaini'],
'horaend' => $_POST['horaend'], 
'tipo' => $_POST['tipo'], 
'modalidade' => $_POST['modalidade'], 
'alimentacao' => $_POST['alimentacao'], 
'onde' => $_POST['onde'], 
'quantidade' => $_POST['quantidade'], 
'solicitante' => $_SESSION['loginEmail'], 
'status' => 0);

$insert = DB::insert('consultas', $data);

if($insert[0]['status'] == 1){
    header('location: home');
}else{

}

?>