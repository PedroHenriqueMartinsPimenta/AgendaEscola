<?php 
include_once('classes/AdmDAO.class.php');
$descricao = $_POST['descricao'];
$DAO = new AdmDAO;
$result = $DAO->addCurso($descricao); 
header('location:../html/adm/add/curso');
?>