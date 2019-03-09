<?php 
	$dado = $_POST['dado'];

	echo json_encode(base64_encode($dado));
?>