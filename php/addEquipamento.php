<?php 
include_once("classes/AdmDAO.class.php");
	$inserir = new AdmDAO;
	$descricao = $_POST['descricao'];
	$qtd = $_POST['qtd'];
	$ft = $_FILES['img']['tmp_name'];
	$ftNome = $_FILES['img']['name'];
	move_uploaded_file($ft,"../imgEquipamentos/".basename($ftNome));
	$urlImg = "http://localhost/agendaEscola/imgEquipamentos/".basename($ftNome);
	$checked = $inserir->addEquipamento($descricao,$qtd,$urlImg);
	if($checked){
		header('location: ../html/adm/add/add');
		}else{
			echo "erro";
			}
?>