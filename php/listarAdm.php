<?php 
include_once("./classes/AdmDAO.class.php");

$codigo = $_POST['codigo'];
$dia = $_POST['dia'];
$admDAO = new AdmDAO();
$array = $admDAO->listarAdm($codigo, $dia);
echo json_encode($array);
?>