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
	$sql="SELECT RESERVA.CODIGO AS CODIGOR,EQUIPAMENTO.CODIGO AS CODIGOE,AULA.CODIGO AS CODIGOA, TURMA.CODIGO AS CODIGOT, EQUIPAMENTO.DESCRICAO AS EQUIPAMENTO, DATE_FORMAT(RESERVA.DATA,'%d/%m/%Y') AS DATA, USUARIO.CPF AS CPF, AULA.DESCRICAO AS AULA, TURMA.DESCRICAO AS TURMA FROM RESERVA INNER JOIN USUARIO ON USUARIO.CPF = RESERVA.USUARIO_CPF 
	INNER JOIN EQUIPAMENTO ON EQUIPAMENTO.CODIGO = RESERVA.EQUIPAMENTO_CODIGO
	INNER JOIN TURMA ON TURMA.CODIGO = RESERVA.TURMA_CODIGO
	INNER JOIN AULA ON AULA.CODIGO = RESERVA.AULA_CODIGO WHERE RESERVA.CODIGO = $codigo";
	$query = mysqli_query($con,$sql);
	while($rowDados = mysqli_fetch_array($query)){
	?>
	
    <input type="text" name="codigo" id="codigo" readonly="readonly" value="<?php echo $rowDados['CODIGOR'] ?>">
	<input type="text" name="data" id="data" value="<?php echo $rowDados['DATA'] ?>">
	<input type="text" name="cpf" id="cpf" value="<?php echo $rowDados['CPF'] ?>">
     
	<select id="equipamento">
    	<option value="<?php echo $rowDados['CODIGOE'];?>"><?php echo $rowDados['EQUIPAMENTO'];?></option>
        <?PHP 
	$sqlEquipamentoOPC="SELECT EQUIPAMENTO.CODIGO AS CODIGOOPC,EQUIPAMENTO.DESCRICAO AS EQUIPAMENTOOPC FROM EQUIPAMENTO WHERE CODIGO !=".$rowDados['CODIGOE']."|| NOT EXISTS (SELECT EQUIPAMENTO_CODIGO FROM RESERVA)";
	$queryEquipamentoOPC = mysqli_query($con,$sqlEquipamentoOPC);
	while($rowDadosEquipamento = mysqli_fetch_array($queryEquipamentoOPC)){
	?>
	<option value="<?php echo $rowDadosEquipamento['CODIGOOPC']?>"><?php echo $rowDadosEquipamento['EQUIPAMENTOOPC'];?></option>
	<?PHP
	}
	?>
    </select>
    
	<select id="aula">
    	<option  value="<?php echo $rowDados['CODIGOA'];?>"><?php echo $rowDados['AULA'];?></option>
        <?PHP 
		$COU =$rowDados['CODIGOA'];
	$sqlAulaOPC="SELECT AULA.CODIGO AS CODIGOOPC,AULA.DESCRICAO AS AULAOPC FROM AULA WHERE CODIGO != $COU";
	$queryOPC = mysqli_query($con,$sqlAulaOPC);
	while($rowDadosAula = mysqli_fetch_array($queryOPC)){
	?>
	<option value="<?php echo $rowDadosAula['CODIGOOPC']?>"><?php echo $rowDadosAula['AULAOPC'];?></option>
	<?PHP
	}
	?>
    </select>


	<select id="turma">
    	<option value="<?php echo $rowDados['CODIGOT'];?>" ><?php echo $rowDados['TURMA'];?></option>
        <?PHP 	
		$COU =$rowDados['CODIGOT'];
	$sqlAulaOPC="SELECT TURMA.CODIGO AS CODIGOOPC,TURMA.DESCRICAO AS TURMAOPC FROM TURMA WHERE CODIGO != $COU ORDER BY DESCRICAO ASC";
	$queryOPC = mysqli_query($con,$sqlAulaOPC);
	while($rowDadosTurma = mysqli_fetch_array($queryOPC)){
	?>
	<option value="<?php echo $rowDadosTurma['CODIGOOPC'] * 1?>"><?php echo $rowDadosTurma['TURMAOPC'];?></option>
	<?PHP
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
	var codigoR = $('#codigo').val();
	var codigoA = $('#aula').val();
	var codigoT = $('#turma').val();
	var codigoU = $('#cpf').val();
	var codigoE = $('#equipamento').val();
	var data = $('#data').val();
	var dados = {codigo:codigoR, aula:codigoA,turma:codigoT,professor:codigoU, equipamento:codigoE, data:data};
	$.post(
	"updateReserva.php",
	dados,
	function(msg){
		console.log(msg);
		location.href="../html/userComum/listar";
		});
	}
</script>
</body>
</html>
