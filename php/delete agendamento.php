<?php 
include_once("conexao.php");
$codigo = $_POST['codigo'];

$sql="DELETE FROM RESERVA WHERE CODIGO = $codigo";

$query = mysqli_query($con,$sql);

echo "#linha".$codigo;
?>