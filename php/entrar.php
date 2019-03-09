<?php
        include_once './classes/ComumDAO.class.php';
	$cpf = $_POST['cpf'];
	$senha =$_POST['senha'];
	$comumDAO = new ComumDAO();
        $comumDAO->entrar($cpf, $senha);
?>