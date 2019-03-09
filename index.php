<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta name="viewport" content="width=device-width">
    	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.css">
	<script type="text/javascript">
		
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
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
<link rel="icon" href="img/ceara.png">
</head>
<body>
	<?php 
		session_start();
		if(isset($_SESSION['CPF'])){
			if($_SESSION['PERMISSAO'] == 0){
				header("location:html/user");
				}else if($_SESSION['PERMISSAO'] == 1){
					header("location:html/administrador");
				}
				
			}
	?>
    <div class="corpo" background="img.jpg">
		<div class="texto">
			<img src="img/userPadrao.png" class="icon" draggable="false">
		</div>
		<form action="php/entrar.php" method="post">
			<table>
				<tr>
					<td><label class="cpf">CPF</label></td>
					<td><input type="text" name="cpf" maxlength="14" autocomplete="off" onkeydown="javascript: fMasc( this, mCPF );" ></td>
				</tr>
				<tr>
					<td><label>Senha</label></td>
					<td><input type="password" name="senha"></td>
				</tr>
				<input type="submit" class="entrar" value="Entrar">
		</table>
		</form>
	</div>

	<script type="text/javascript" src="js/jquery.mobile.js"></script>
</body>
</html>