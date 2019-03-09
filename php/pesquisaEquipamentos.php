<?php
include_once('./classes/UserComumDAO.class.php');

$equipamento= $_POST['equi'];
$dia = $_POST['dia'];
$userComumDAO = new UserComumDAO();
$array = $userComumDAO->pesquisaEquipamentos($equipamento, $dia);
echo json_encode($array);

?>
