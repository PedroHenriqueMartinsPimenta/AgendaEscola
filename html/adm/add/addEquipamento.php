<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Equipamentos</title>
<link rel="stylesheet" type="text/css" href="../../../css/style adm.css" />
<link rel="stylesheet" type="text/css" href="../../../css/style add equipamento.css" />
<meta name="viewport" content="width=device-width" />
<link rel="icon"  href="../../../img/ceara.png">
<?php
include_once('../../../php/conexao.php');
session_start();
$cpf = $_SESSION['CPF'];
$permissao = $_SESSION['PERMISSAO'];
if(isset($cpf) && $permissao == 1){
?>
</head>

<body>
<header class="banner">
	<div class="loga">
    </div>
    <img class="perfil" src="<?php echo $_SESSION['FOTO']?>" draggable="false">
</header>
<div class="linha"></div>
<nav>
	<ul>
    	<li><img src="../../../img/menu.png" class="imgMenu" id="menuH" draggable="false" style="cursor: pointer;"></li>
    	<li><a href="../../administrador"><img src="../../../img/home.png" class="imgMenu" draggable="false"><p class="legenda" >Home</p></li>
    	<li><a href="../dados/listar"><img src="../../../img/list.png" class="imgMenu" draggable="false"><p class="legenda" >Agendamentos</p></a></li>
    	<li><a href="add"><img src="../../../img/addEquipamento.png" class="imgMenu" draggable="false"><p class="legenda" >Add Equipamentos</p></a></li>
        <li><a href="../dados/equipamentos"><img src="../../../img/list.Equipamentos.png" class="imgMenu" draggable="false"><p class="legenda" >Listar Equipamentos</p></a></li>
    	<li><a href="professor"><img src="../../../img/addUser.png" class="imgMenu" draggable="false"><p class="legenda" >Add Professor</p></a></li>
        <li><a href="../dados/professores"><img src="../../../img/listProfessor.png" class="imgMenu" draggable="false"><p class="legenda" >Listar Professores</p></a></li>
    	<li><a href="curso"><img src="../../../img/addCurso.png" class="imgMenu" draggable="false"><p class="legenda" >Add Curso</p></a></li>
    	<li><a href="../dados/dados"><img src="../../../img/user-icon.png" class="imgMenu" draggable="false"><p class="legenda">Dados pessoais</p></a></li>
    	<li><A href="../../../php/sair.php"><img src="../../../img/sair.png" class="imgMenu" draggable="false"><p class="legenda">Sair</p></A></li>
    </ul>
</nav>
<main>
<div class="content">    
    <div class="form">
    <form action="../../../php/addEquipamento.php" method="post" enctype="multipart/form-data">
    	<p>Adicionar equipamentos:</p>
        <input type="text" name="descricao" placeholder="Descrição equipamento" class="input">
        <input type="number" name="qtd" placeholder="Quantidade" min="0" class="input"><br>
        <label class="label">Selecionar icone:</label><br><input type="file" name="img" accept="image/png, image/jpeg" class="file">
        <input type="submit" value="Cadastrar" class="button" id="botao">
    </form>
</div>
<div>

</main>

<link rel="stylesheet" type="text/css" href="../../../jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.css">
<script src="../../../jquery-ui-1.12.1/jquery-3.3.1.js"></script>
<script>
$(document).ready(function(e) {

		var is = 0;
		$('#menuH').click(function(){
			if(is == 0){
			$('nav').addClass('navGrande');
			 document.getElementById('menuH').src = '../../../img/x.png';
			 $('.legenda').css('display','inline');
			 is = 1;
			} else if(is == 1){
			 $('nav').removeClass('navGrande');
			 document.getElementById('menuH').src = '../../../img/menu.png';
			  $('.legenda').css('display','none');
			 is = 0;
				}
			});
			$('main, header, footer').click(function(){
				$('nav').removeClass('navGrande');
			 	document.getElementById('menuH').src = '../../../img/menu.png';
			  	$('.legenda').css('display','none');
			 	is = 0;
				});
				
    });
</script>

</body>
</html>
<?php 
}else{
	session_destroy();
	header('location:../../../');
	}
?>