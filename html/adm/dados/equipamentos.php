<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Equipamentos</title>
<link rel="stylesheet" type="text/css" href="../../../css/style adm.css" />
<link rel="icon"  href="../../../img/ceara.png">
<meta name="viewport" content="width=device-width" />
<style>
	.ft{
		width:80px;
		height:80px;
		}
	
</style>
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
        <li><img src="../../../img/list.Equipamentos.png" class="imgMenu" draggable="false"><p class="legenda" >
        Listar Equipamentos</p></li>
    	<li><a href="../add/professor"><img src="../../../img/addUser.png" class="imgMenu" draggable="false"><p class="legenda" >Add Professor</p></a></li>
        
        <li><a href="professores"><img src="../../../img/listProfessor.png" class="imgMenu" draggable="false"><p class="legenda" >Listar Professores</p></a></li>
    	<li><a href="../add/curso"><img src="../../../img/addCurso.png" class="imgMenu" draggable="false"><p class="legenda" >Add Curso</p></a></li>
    	<li><a href="dados"><img src="../../../img/user-icon.png" class="imgMenu" draggable="false"><p class="legenda">Dados pessoais</p></a></li>
    	<li><a href="../../../php/sair.php"><img src="../../../img/sair.png" class="imgMenu" draggable="false"><p class="legenda">Sair</p></a></li>
    </ul>
</nav>
<main>
<div class="tableList">
<div class="opcs">

	<div id="print" class="print" style="cursor: pointer;">
	Imprimir
	</div>
</div>
<table>

    <tr id="ca">
        <td>Icon</td>
        <td>Descrição</td>
        <td>Quantidade</td>
        <td name="update">Editar</td>
        <td name="delete">Excluir</td>
    </tr>
	<?php 
	$sql = "SELECT * FROM EQUIPAMENTO ORDER BY DESCRICAO ASC";
	$queryAgendamento = mysqli_query($con,$sql);
	while($rowList = mysqli_fetch_array($queryAgendamento)){
		?>
			<tr id="linha<?php echo $rowList['CODIGO']?>">
            	<td><img class="ft" src="<?php echo $rowList['ICON']?>" draggable="false"></td>
                <td><?php echo $rowList['DESCRICAO']?></td>
                <td><?php echo $rowList['QUANTIDADE']." unidade"?></td>
                <td name="update"><a href="../../../php/updateEquipamento.php?codigo=<?php echo $rowList['CODIGO'];?>"><img src="../../../img/edit-file.png" width="30"></a></td>
                <td name="delete"><img src="../../../img/delete.png" width="30" onclick="excluir(<?php echo $rowList['CODIGO']?>)"></td>
   			 </tr>
		<?php
		}
	?>

</table>
</div>

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
				$('#print').click(function(){
					var tabela = $('main').html() +'<style>main{position:relative;top:10px;width:100%;min-height:500px;}.msg{position:relative;margin:0 auto;top:200px;width:300px;height:100px;text-align:center;background-color:#0C3;color:#FFF;border:#000 ridge 3px;box-shadow:#999 10px 5px 4px 1px;border-radius:10px 0px 10px 0px}.msg p{position:relative;top:35%;font-size:24px;font-family:Tahoma, Geneva, sans-serif}a{text-decoration:none}.content{position:relative;top:20px;width:800px;min-height:500px;border-radius:10px;border-left:#666 solid 3px;border-right:#666 solid 3px;margin:0 auto;}.tableList{padding-top:20px;width:80%;margin:0 auto;}.tableList table{margin:0 auto;width:800px;text-align:center;border:#0C3 ridge 3px}.tableList td{height:30px;border-bottom:1px ridge #0C3;}.ft{width:80px;height:80px;}</style>', tela = window.open("about:blank");

					tela.document.write(tabela);
					var len = document.getElementsByName('update').length;
					for (var i = 0; i < len; i++) {
						tela.document.getElementsByName("update").item(i).style.display = "none";
						tela.document.getElementsByName("delete").item(i).style.display = "none";
					}
					tela.print();
					tela.window.close();
					});
    });
</script>
<script>
	function excluir(codigo){
		var confirmacao = confirm("Exluir agendamento?");
		if(confirmacao){
			var data ={codigo: codigo};
			$.post(
			"../../../php/delete equipamento.php",
			data,
			function(result){
				$(result).html("");
				$(result).fadeOut(1);
				}
			)
			}
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