<?php
include_once('classes/ComumDAO.class.php'); 
$senhaAntiga = $_POST['senhaAntiga'];
$newSenha = $_POST['newSenha'];
$confSenha = $_POST['confSenha'];
$cpf = $_POST['cpf'];
session_start();
if($confSenha == $newSenha){
$comumDAO = new ComumDAO();
$query = $comumDAO->updateSenha($cpf, $newSenha);
if($query){ 
	$_SESSION['senha'] = base64_encode($newSenha);
	echo json_encode("Dados atualizados com sucesso!");
	}else{
		echo json_encode(mysqli_error($con));
		}
}else{
	json_encode("Senhas incompativeis");
	}
?>