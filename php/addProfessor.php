<?php
include_once('classes/AdmDAO.class.php');
$cpf= $_POST['cpf'];
$name = $_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$permissao=$_POST['permissao'];
$email = $_POST['email'];
$senha=$_POST['senha'];
$img = $_FILES['foto']['tmp_name'];
$nome = $_FILES['foto']['name'];
$DAO = new AdmDAO;
$DAO->addProfessor($cpf,$nome,$name,$img,$sobrenome,$senha,$permissao,$email);

?>