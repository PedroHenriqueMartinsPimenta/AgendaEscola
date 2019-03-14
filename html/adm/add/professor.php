<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Equipamentos</title>
<link rel="stylesheet" type="text/css" href="../../../css/style adm.css" />
<link rel="stylesheet" type="text/css" href="../../../css/style add equipamento.css" />
<link rel="icon"  href="../../../img/ceara.png">
<meta name="viewport" content="width=device-width">
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
    	<li><img src="../../../img/addUser.png" class="imgMenu" draggable="false"><p class="legenda" >Add Professor</p></li>
        <li><a href="../dados/professores"><img src="../../../img/listProfessor.png" class="imgMenu" draggable="false"><p class="legenda" >Listar Professores</p></a></li>
    	<li><a href="curso"><img src="../../../img/addCurso.png" class="imgMenu" draggable="false"><p class="legenda" >Add Curso</p></></li>
    	<li><a href="../dados/dados"><img src="../../../img/user-icon.png" class="imgMenu" draggable="false"><p class="legenda">
        Dados pessoais</p></a></li>
    <li><a href="../../../php/sair.php"><img src="../../../img/sair.png" class="imgMenu" draggable="false"><p class="legenda">Sair</p></a></li>
     </ul>
</nav>
<main>
<div class="content">    
    <div class="form">
   		<form action="../../../php/addProfessor.php" method="post" enctype="multipart/form-data">
        	<p>Adicionar professor</p>
            <input type="text" id="cpf" name="cpf" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" placeholder="CPF" class="input">
            <input type="text" id="nome" name="nome" placeholder="Nome" class="input">
            <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" class="input">
            <input type="email" name="email" placeholder="E-mail" class="input">
            <input type="password" id="senha" name="senha" placeholder="Senha" class="input">
            <select name="permissao" id="permisao" class="input">
            	<option value="0">Professor</option>
            	<option value="1">Administrador</option>
            </select>
            <label class="label">Selecionar foto de usuario:</label>
            <input type="file" name="foto" accept="image/png, image/jpeg" class="file">
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
<script>
	
		
			function fMasc(objeto,mascara) {
				obj=objeto
				masc = mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}
	
</script>
</body>
</html>
<?php 
}else{
	session_destroy();
	header('location:../../../');
	}
?>