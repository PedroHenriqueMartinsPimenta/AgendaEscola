<?php 
include_once './classes/UserComumDAO.class.php';
$codigo = $_POST['codigo'];
$dia = $_POST['dia'];
$cpf = $_POST['cpf'];
$userComumDAO = new UserComumDAO();
$array = $userComumDAO->listarUserComum($codigo, $dia, $cpf);
echo json_encode($array);
?>