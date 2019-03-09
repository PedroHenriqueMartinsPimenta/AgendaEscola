<?php 
include_once("classes/UserComumDAO.class.php");
 $cpf = $_POST['cpf'];
$userComumDAO = new UserComumDAO();
$array = $userComumDAO->removerFiltro($cpf);
echo json_encode($array);
?>