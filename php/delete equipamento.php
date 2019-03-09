<?php 
include_once("conexao.php");
$codigo = $_POST['codigo'];

$sql="DELETE FROM RESERVA WHERE EQUIPAMENTO_CODIGO = $codigo";

$query = mysqli_query($con,$sql);
if($query){
	$sqlUser = "DELETE FROM EQUIPAMENTO WHERE CODIGO = $codigo";
	$queryUser = mysqli_query($con,$sqlUser);
	}

echo "#linha".$codigo;
?>
