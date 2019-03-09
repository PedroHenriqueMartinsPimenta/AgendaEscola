<?php 
include_once("conexao.php");
$codigo = $_POST['codigo'];

$sql="DELETE FROM RESERVA WHERE USUARIO_CPF = '$codigo'";

$query = mysqli_query($con,$sql);
if($query){
	$sqlUser = "DELETE FROM USUARIO WHERE CPF = '$codigo'";
	$queryUser = mysqli_query($con,$sqlUser);
	}
$numeros = "";
for($i = 0; $i<14;$i++){
		if(substr($codigo,$i,1) !='.' && substr($codigo,$i,1) !='-'){
			$numeros .= substr($codigo,$i,1);
			}
		}
echo "linha".$numeros;
?>
