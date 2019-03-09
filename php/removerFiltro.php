<?php 
include_once("./classes/AdmDAO.class.php");
$admDAO = new AdmDAO();
$array = $admDAO->removerFiltro();
echo json_encode($array);
?>