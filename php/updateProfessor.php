<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Equipamentos</title>
<link rel="stylesheet" type="text/css" href="../css/style adm.css" />
<link rel="stylesheet" type="text/css" href="../css/sttyle update.css">
<link rel="icon"  href="../img/ceara.png">
<?php
include_once('conexao.php');
$codigo = $_GET['codigo'];
?>
</head>

<body>
<header class="banner">
	<div class="loga">
    </div>
</header>
<div class="linha"></div>
<nav>
	<ul>
    	<li><img src="../img/menu.png" class="imgMenu" id="menuH" draggable="false"></li>
    	<li><img src="../img/list.png" class="imgMenu" draggable="false"><p class="legenda" >Agendamentos</p></li>
    	<li><img src="../img/addEquipamento.png" class="imgMenu" draggable="false"><p class="legenda" >Add Equipamentos</p></li>
    	<li><img src="../img/addUser.png" class="imgMenu" draggable="false"><p class="legenda" >Add Professor</p></li>
    	<li><img src="../img/addCurso.png" class="imgMenu" draggable="false"><p class="legenda" >Add Curso</p></li>
    	<li><img src="../img/user-icon.png" class="imgMenu" draggable="false"><p class="legenda">Dados pessoais</p></li>
    	<li><img src="../img/sair.png" class="imgMenu" draggable="false"><p class="legenda">Sair</p></li>
    </ul>
</nav>
<main>

<div class="content">    
    <div class="form">
    <div class="tableList">
<div class="form">
<form action="updateReserva.php" method="post">
<p>Atualizar dados:</p> 
	<?PHP 
	$sql="SELECT * FROM USUARIO WHERE CPF = '$codigo'";
	$query = mysqli_query($con,$sql);
	$CPF;
	while($rowDados = mysqli_fetch_array($query)){
		$cpf = $rowDados['CPF'];
		$CPF=$rowDados['CPF'];
		
	?>
    <input type="text" name="codigo" id="cpf" readonly="readonly" value="<?php echo $cpf ?>">
	<input type="text" name="data" id="nome" value="<?php echo $rowDados['NOME'] ?>">
	<input type="text" name="cpf" id="sobrenome" value="<?php echo $rowDados['SOBRENOME'] ?>">
    <select id="ativo">
    	<?php 
			if($rowDados['ATIVO']==1){
				?>
					<option value="1">Ativo</option>
					<option value="0">Desativo</option>
				<?php
				}else{
					?>
						<option value="0">Desativo</option>
						<option value="1">Ativo</option>
					<?php
					}
		?>
    </select>
    <select id="permissao">
    	<?php 
			if($rowDados['PERMISSAO']==1){
				?>
					<option value="1">Administrador</option>
					<option value="0">Professor</option>
				<?php
				}else{
					?>
						<option value="0">Professor</option>
						<option value="1">Administrador</option>
					<?php
					}
		?>
    </select>
    <input type="button" value="Atualizar" onclick="update()">
    <?php
	}
	?>
    
    
    
</form>
</div>
</div>
</div>
<div>
</main>

<link rel="stylesheet" type="text/css" href="../jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.css">
<script src="../jquery-ui-1.12.1/jquery-3.3.1.js"></script>
<script>
$(document).ready(function(e) {
		
		var is = 0;
		$('#menuH').click(function(){
			if(is == 0){
			$('nav').addClass('navGrande');
			 document.getElementById('menuH').src = '../img/x.png';
			 $('.legenda').css('display','inline');
			 is = 1;
			} else if(is == 1){
			 $('nav').removeClass('navGrande');
			 document.getElementById('menuH').src = '../img/menu.png';
			  $('.legenda').css('display','none');
			 is = 0;
				}
			});
		
			$('main, header, footer').click(function(){
				$('nav').removeClass('navGrande');
			 	document.getElementById('menuH').src = '../img/menu.png';
			  	$('.legenda').css('display','none');
			 	is = 0;
				});
				
    });
</script>
<script>
function update(){
	var cpf = '<?php echo $CPF?>';
	var nome = $('#nome').val();
	var sobrenome = $('#sobrenome').val();
	var senha = $('#senha').val();
	var ativo = $('#ativo').val();
	var permissao = $('#permissao').val();
	var dados = {cpf:cpf,nome:nome,sobrenome:sobrenome,senha:senha,ativo:ativo,permissao:permissao};
	$.post(
	"updateProfessorScript.php",
	dados,
	function(msg){
		console.log(msg);
		location.href="../html/adm/dados/professores";
		});
	}
</script>
</body>
</html>
