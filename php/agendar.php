<?php
include_once('conexao.php');
$cpf = $_POST['cpf'];
$aula = $_POST['aula'];
$equipamento = $_POST['equipamento'];
$sala = $_POST['sala'];
$data = $_POST['data'];
$data_ultilizar = $_POST['data_ultilizar'];
$sql = "INSERT INTO RESERVA (DATA,USUARIO_CPF,EQUIPAMENTO_CODIGO,AULA_CODIGO,TURMA_CODIGO,DATA_ULTILIZAR)
 VALUES('$data','$cpf',$equipamento,$aula,$sala,'$data_ultilizar')";
$query = mysqli_query($con,$sql);
if($query){
	echo json_encode("1");
	}else{
		echo json_encode(mysqli_error($con));
		}
?>