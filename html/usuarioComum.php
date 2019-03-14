<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Equipamentos</title>
<link rel="stylesheet" type="text/css" href="../css/styleusuariocomum.css" />
<link rel="icon"  href="../img/ceara.png">
<link rel="stylesheet" type="text/css" href="../css/jquery.mobile.css" />
<meta name="viewport" content="width=device-width">
<script src="../js/funcoes usuario comum.js"></script>
<?php
include_once('../php/conexao.php');
session_start();
@$cpf = $_SESSION['CPF'];
if(isset($cpf)){
?>

<script>
				function getMinDate(){
						var dia = getData();
						return dia[0];
						}
				function getMaxDate(){
						var dia = getData();
						return dia[1];
						}
</script>
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
    	<li><img src="../img/menu.png" class="imgMenu" id="menuH" draggable="false" style="cursor: pointer;"></li>
    	<li><img src="../img/home.png" class="imgMenu" draggable="false"><p class="legenda" style="cursor: pointer;">Home</p></li>
    	<li><a href="userComum/listar"><img src="../img/list.png" class="imgMenu" draggable="false"><p class="legenda" >Agendamentos</p></a></li>
    	<li><a href="userComum/dados"><img src="../img/user-icon.png" class="imgMenu" draggable="false"><p class="legenda">Dados pessoais</p></a></li>
    	<li><a href="../php/sair.php"><img src="../img/sair.png" class="imgMenu" draggable="false"><p class="legenda">Sair</p></a></li>
    </ul>
</nav>
<main>
<div class="form">
    <form id="form">
    <input type="reset" id="resert" style="display:none">
        <div class="abas">
            <div class="alignAbas">
                <div class="abaEquipamento">
                    <p><img src="../img/projector.png" class="icon" draggable="false"> Equipamentos</p>
                </div>
                <div class="abaHorario">
                    <p><img src="../img/relogio.png" class="icon" draggable="false"> Horarios</p>
                 </div>
                <div class="abaSala">
                    
                    <p><img src="../img/sala.png" class="icon" draggable="false"> Salas</p>
                </div>
            </div>
        </div>
        
        <div class="janelas">
   
        	<p id="dia">Selecionar dia: <br><input type="date" id="dias" name="dia" />
                        <script>
                        	var mmin = getMinDate();
							var mmax = getMaxDate();
                        	document.getElementById('dias').setAttribute('min',mmin);
                        	document.getElementById('dias').setAttribute('max',mmax);
                          	document.getElementById('dias').value = mmin;
                        	
                        </script>
                        </p>
        	<div class="janelaHome">
            	<div class="buttonPrincipal" title="Agendar equipamento" style="cursor: pointer;">Agendar <br> equipamento</div>
            </div>
            <div class="janelaHorario">
           			<div class="formHorario">
                    	
                    	<p><input type="checkbox"  name="aula1" value="1" id="aula1"> Aula 1</p>
                    	<p><input type="checkbox" name="aula2" value="2" id="aula2"> Aula 2</p>
                    	<p><input type="checkbox" name="aula3" value="3" id="aula3"> Aula 3</p>
                    	<p><input type="checkbox" name="aula4" value="4" id="aula4"> Aula 4</p>
                    	<p><input type="checkbox" name="aula5" value="5" id="aula5"> Aula 5</p>
                    	<p><input type="checkbox" name="aula6" value="6" id="aula6"> Aula 6</p>
                    	<p><input type="checkbox" name="aula7" value="7" id="aula7"> Aula 7</p>
                    	<p><input type="checkbox" name="aula8" value="8" id="aula8"> Aula 8</p>
                    	<p><input type="checkbox" name="aula9" value="9" id="aula9"> Aula 9</p>
                        <p><input type="button" value="Desmarcar todos" onclick="desmarcar()" class="format"/>
                        <p><input type="button" value="Marcar todos" onclick="marcar()" class="format"/>
                    </div>
                    
                    	<div class="pass" id="formHorario" style="cursor: pointer;">
                        	<p>Proximo</p>
                        </div>
                        <div class="voltar" id="voltHorario" style="cursor: pointer;">
                        	<p>voltar</p>
                        </div>
            </div>
            <div class="janelaEquipamento">
           			<div class="formEquipamentos">
                    	<div class="equipamentos">
                        <?php
						$lengt = 0;
						$sql = "SELECT * FROM EQUIPAMENTO ORDER BY DESCRICAO ASC";
						$arrayID = array();
						$arrayCODIGO = array();
                    	$query = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($query)){
							$arrayID[$lengt] = "equi".$row['CODIGO'];
							$arrayCODIGO[$lengt] = $row['CODIGO'];
							$lengt++;
							?>
							<div class="equipamentos">
                            <div id="<?php echo "info".$row['CODIGO']?>" class="itens">
                        	<input type="radio" value="<?php echo $row['CODIGO']?>"
                             id="equi<?php echo $row['CODIGO']?>" 
                             name="equi">
                            <p id="descricao<?php echo $row['CODIGO'] ?>"> 
                            <?PHP echo $row['DESCRICAO']?></p><br><img src="<?PHP echo $row['ICON']?>" class="equi">
                        	</div>
                        </div>
							<?php
							
							}
					?>
                    </div>
                    </div>
                    <div class="pass" id="formEquipamento" style="cursor: pointer;">
                        	<p>Proximo</p>
                        </div>
            </div>
            <div class="janelaSala">
           			<div class="formSala">
                    	<table align="center" style="padding-bottom: 100px;">
                        
                    	<?php 
						$sqlTurmas = "SELECT * FROM TURMA ORDER BY DESCRICAO ASC";
						$queryTurma = mysqli_query($con,$sqlTurmas);
						$turmaCodigo = array();
						$count = 0;
						while($rowTurma = mysqli_fetch_array($queryTurma)){
							?>
							  <tr><td>
                            <p>
                          		<input type="radio" value="<?PHP echo $rowTurma['CODIGO']?>"
                                 name="sala"
                                 id="<?php echo "turma".$rowTurma['CODIGO'] * 1?>"> 
                                 <span id="leg<?php echo $rowTurma['CODIGO'] * 1?>"><?php echo $rowTurma['DESCRICAO'] ?></span></p>
                               </td> 
                               </tr>
							<?php
							$turmaCodigo[$count] = $rowTurma['CODIGO']*1;
							$count++;
							}
						?>
                     </table>
                    </div>
                    <div class="voltar" id="voltSala" style="cursor: pointer;">
                        	<p>Voltar</p>
                        </div>
                    <div id="formSala" class="pass" style="cursor: pointer;">
                        	<p>Agendar</p>
                        </div>
                     
            </div>
            <div class="janelaConfimacao">
                            <div class="formSala">
                            Confirmação:
                                <table class="tableConfirm">
                                	<tr>
                                    	<td>
                                        	Aula
                                        </td>
                                    	<td>
                                        	Equipamento
                                        </td>
                                    	<td>
                                        	Sala
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <div class="voltar" id="close" style="cursor: pointer;">
                                <p>Cancelar</p>
                            </div>
                        <div id="formConfirmacao" class="pass" style="cursor: pointer;">
                                <p>Confirmar</p>
                            </div>
        </div>
    </form>
</div>
</main>

<link rel="stylesheet" type="text/css" href="../jquery-ui-1.12.1/jquery-ui-1.12.1/jquery-ui.css">
<script src="../jquery-ui-1.12.1/jquery-3.3.1.js"></script>
<script>
	$(document).ready(function(e) {
        $('.buttonPrincipal').click(function(){
			$('.janelaHome').fadeOut(1);
			$('.janelaEquipamento').fadeIn(1000);
			$('.abaEquipamento').addClass('abaSelecionada');
		});
		var length = <?php echo $lengt?>;
		var lengthTurmas = <?php echo $count?>;
		$('#formHorario').click(function(){
			$('.janelaHorario').fadeOut(1);
			$('.janelaSala').fadeIn(1000);
			$('.abaSala').addClass('abaSelecionada');
			$("#dia").fadeOut(1000);
		});
		$('#formEquipamento').click(function(){
			var arrayID = <?php echo json_encode($arrayID)?>;
			var arrayCODIGO = <?php echo json_encode($arrayCODIGO)?>;
			
			equipamentoHasAulas(arrayID, arrayCODIGO);
			$('.janelaEquipamento').fadeOut(1);
			$('.janelaHorario').fadeIn(1000);
			$('.abaHorario').addClass('abaSelecionada');
		});
		$('#formSala').click(function(){
			$('.janelaSala').fadeOut(1);
			$('.janelaConfimacao').fadeIn(1000);
			$('.abaSala').addClass('abaSelecionada');
			var table = ""+$('.tableConfirm').html();
			var turmas = <?php echo json_encode($turmaCodigo)?>;
			var equii = <?php echo json_encode($arrayCODIGO)?>;
			vereficarAgendamento(table, turmas, equii);
		});
		
		$('#formConfirmacao').click(function(){
			var aula;
			var equipamento;
			var sala;
			var data;
			var cpf = '<?PHP echo $cpf?>';;
			var efetuado = false;	
			var arrayEquipamentos = <?php echo json_encode($arrayCODIGO)?>;
			var arrayTurmas = <?php echo json_encode($turmaCodigo)?>;
			efetuarAgendamento(aula, equipamento, sala, data, cpf, efetuado, arrayEquipamentos, arrayTurmas);
			});
			$('#close').click(function(){
				$('#dia').fadeIn(500);
				$('#resert').click();
				$('.janelaConfimacao').fadeOut(0);
				$('.janelaHome').fadeIn(1000);
				$('.abaHorario, .abaEquipamento, .abaSala').removeClass('abaSelecionada');
				$('.tableConfirm').html("<tr><td>Aula</td><td>Equipamento</td><td>Sala</td></tr>")
				});
		$('#voltSala').click(function(){
			$('.abaSala').removeClass('abaSelecionada');
			$('.janelaSala').fadeOut(1);
			$('.janelaHorario').fadeIn(1000);
			$('.abaHorario').addClass('abaSelecionada');
			$('#dia').fadeIn('1000');
		});
		$('#voltHorario').click(function(){
			$('.abaHorario').removeClass('abaSelecionada');
			$('.janelaHorario').fadeOut(1);
			$('.janelaEquipamento').fadeIn(1000);
			var arrayLength = <?php echo json_encode($arrayID)?>;
			for(var i = 1; i <= 9;i++){
				document.getElementById('aula'+i).disabled = false;
				document.getElementById('aula'+i).checked = false;
			}
			$('.abaEquipamento').addClass('abaSelecionada');	
		});
		
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
		$('#dias').click(function(){
			var arrayID = <?php echo json_encode($arrayID)?>;
			var arrayCODIGO = <?php echo json_encode($arrayCODIGO)?>;
			for (var i = 1 ; i <= 9; i++) {
				document.getElementById('aula'+i).disabled = false;
				document.getElementById('aula'+i).checked = false;
			}
			for(var i = 0; i < arrayID.length; i++ ){
				var checked = document.getElementById(arrayID[i]).checked;

				if(checked){
					pesquisarAulas(arrayCODIGO[i]);
				}
			}
		});
				
    });
</script>
<script src="../js/jquery.mobile.js"> </script>
</body>
</html>
<?php 
}else{
	session_destroy();
	header('location:../');
	}
?>