<?php
	include_once 'classes/ComumDAO.class.php';
        $comumDAO = new ComumDAO();
        $comumDAO->close();
	header("location:../");
?>