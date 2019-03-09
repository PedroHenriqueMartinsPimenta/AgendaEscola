<?php 
include_once("classes/AdmDAO.class.php");
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$ativo  = $_POST['ativo'];
$permissao = $_POST['permissao'];
$admDAO = new AdmDAO();
$query = $admDAO->updateProfessor($nome, $sobrenome, $ativo, $permissao, $cpf);
if($query){
	echo "OK";
	}else{
		echo "erro";
		}  

?>