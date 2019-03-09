<?php 
include_once("classes/ComumDAO.class.php");

$codigo = $_POST['codigo'];
$equipamento = $_POST['equipamento'];
$aula = $_POST['aula'];
$turma = $_POST['turma'];
$professor = $_POST['professor'];
$data = $_POST['data'];
$dia = substr($data,0,2);
$mes = substr($data,3,2);
$ano = substr($data,6,4);
$dataConvertida = $ano."-".$mes."-".$dia;
$comumDAO = new ComumDAO();
$query = $comumDAO->updateReserva($dataConvertida, $professor, $equipamento, $aula, $turma, $codigo);
if($query){
	echo "OK";
	}else{
		echo "erro";
		}

?>