<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Equipamentos</title>
<link rel="stylesheet" type="text/css" href="../../../css/styleusuariocomum.css" />
<link rel="icon"  href="../../../img/ceara.png">
<meta name="viewport" content="width=device-width" />
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
    	<li><a href="../../administrador"><img src="../../../img/home.png" class="imgMenu" draggable="false"><p class="legenda" >Home</p></a></li>
    	<li><a href="listar"><img src="../../../img/list.png" class="imgMenu" draggable="false"><p class="legenda" >Agendamentos</p></a></li>
    	<li><a href="../add/add"><img src="../../../img/addEquipamento.png" class="imgMenu" draggable="false"><p class="legenda" >Add Equipamentos</p></a></li>
        <li><a href="equipamentos"><img src="../../../img/list.Equipamentos.png" class="imgMenu" draggable="false"><p class="legenda" >Listar Equipamentos</p></a></li>
    	<li><a href="../add/professor"><img src="../../../img/addUser.png" class="imgMenu" draggable="false"><p class="legenda" >Add Professor</p></a></li>
        <li><a href="professores"><img src="../../../img/listProfessor.png" class="imgMenu" draggable="false"><p class="legenda" >Listar Professores</p></a></li>
    	<li><a href="../add/curso"><img src="../../../img/addCurso.png" class="imgMenu" draggable="false"><p class="legenda" >Add Curso</p></a></li>
    	<li><img src="../../../img/user-icon.png" class="imgMenu" draggable="false"><p class="legenda">Dados pessoais</p></li>
    	<li><a href="../../../php/sair.php"><img src="../../../img/sair.png" class="imgMenu" draggable="false"><p class="legenda">Sair</p></a></li>
    </ul>
</nav>
<main>
<div class="janelas">
    <div class="janelaHome">
        <div class="contentDados">
            <?php 
                $sql = "SELECT * FROM USUARIO WHERE CPF = '$cpf'";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);
				
            ?>
            <div class="dadosPessoais">
                <p>Nome: 
                    <?php 
                        echo $row['NOME']." ".$row['SOBRENOME'];
                    ?>
                </p>
            </div>
            <div class="dadosPessoais">
                <p>CPF: 
                    <?php 
						echo $row['CPF'];
                    ?>
                </p>
            </div>
            <div class="dadosPessoais">
                <p ><A id="update" style="cursor: pointer;">Alterar senha</A>
                </p>
            </div>
        </div>
    </div>
</div>
</main>
<div class="escuro">
	</div>

		<div class="modal">
			<div class="x"><b>X</b></div>
			<img src="../../../img/1.png" class="imagem">
			<h3 class="titulo">Alteração de senha</h3>
			<form>
            	<input type="password" name="senhaantiga" id="antiga" placeholder="Senha atual" onkeyup="criptografar(this)"><br>
				<input type="password" name="novasenha" id="nova" placeholder="Nova senha"><br>
                <input type="password" name="confirmacao" id="confirmar" placeholder="Confirme sua senha"><br>
				<input type="button" value="Alterar" id="botao">
			</form>
		</div>
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
				$('#update').click(function (){
                                    $(".escuro").fadeIn(1000);
                                    $(".modal").fadeIn(1000);
				});
		
		$(".escuro").hide();	
			$(".x").click(function(){
				$(".escuro").hide("slow");
				$(".modal").hide("slow");
			});
			$(".aparecer").click(function(){
				$(".escuro").fadeIn(1000);
				$(".modal").fadeIn(1000);
			});
			$(".escuro").click(function(){
				$(this).hide("slow");
				$(".modal").hide("slow");
			});
				window.onkeydown = function(){
				var ke  =String.fromCharCode(window.event.keyCode);
				if(ke == ''){
						$(".escuro").hide("slow");
						$(".modal").hide("slow");
					}
				}
			$('#botao').click(function(){
				updateSenha();
				});
    });
</script>
<script>
	var senha = '<?php echo json_encode($_SESSION["senha"])?>';
	var senhaAtual;
function updateSenha(){
	var nova = $('#nova').val();
	var conf = $('#confirmar').val();
	var cpf = <?php echo json_encode($cpf)?>;
	console.log(senha + " == " + senhaAtual);
	if(senha == senhaAtual){
	var data = {senhaAntiga:senhaAtual,newSenha:nova,confSenha:conf,cpf:cpf};
	
	if(nova == conf){

		$.post(
			"../../../php/updateSenha.php",
			data,
			function(msg){
				alert(msg);
				$('.x').click();
				criptografia(nova);
				},"JSON"
		);
		}else{
			alert("Senhas incompativeis!");
			}
	}else{
		alert("Esta não é sua senha atual \n necessario informar sua atual senha. \n Caso perda de senha informar ao administrador");
		}
	}

	function criptografar(campo){
		var dado = campo.value;
		var data = {dado:dado};
		$.post(
			"../../../php/criptografar.php",
			data,
			function(senhaCriptografada){
				senhaAtual = senhaCriptografada;
			}
			);

	}
	function criptografia(campo){
		var dado = campo;
		var data = {dado:dado};
		$.post(
			"../../../php/criptografar.php",
			data,
			function(senhaCriptografada){
				senha = senhaCriptografada;
			}
			);

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