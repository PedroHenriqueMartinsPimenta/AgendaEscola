<?php 
include_once('Conexao.class.php');
class UserComumDAO extends Conexao{
	public function listar($codigo,$cpf,$dia){
				$con = $this->openConnection();
						$sql="SELECT RESERVA.CODIGO AS CODIGO,DATE_FORMAT(RESERVA.DATA_ULTILIZAR,'%d/%m/%Y') AS DATA, USUARIO.NOME AS NOME, EQUIPAMENTO.DESCRICAO AS EQUIPAMENTO, AULA.DESCRICAO AS AULA, TURMA.DESCRICAO AS TURMA FROM RESERVA
				INNER JOIN EQUIPAMENTO ON EQUIPAMENTO.CODIGO = RESERVA.EQUIPAMENTO_CODIGO 
				INNER JOIN USUARIO ON RESERVA.USUARIO_CPF = USUARIO.CPF
				INNER JOIN AULA ON RESERVA.AULA_CODIGO = AULA.CODIGO
				INNER JOIN TURMA ON RESERVA.TURMA_CODIGO = TURMA.CODIGO WHERE AULA_CODIGO ". $codigo ." AND DATA_ULTILIZAR = '$dia' AND USUARIO_CPF = $cpf ORDER BY AULA ASC ";
				$array = array();
                                $count = 0;
                                
                                $tpmt = $con->prepare($sql);
                                $tpmt->execute();
                                $result = $tpmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $rowList){
				$array[$count] = '<tr id="linha'.$rowList['CODIGO'].'">
								<td>'.$rowList['NOME'].'</td>
								<td>'.$rowList['EQUIPAMENTO'].'</td>
								<td>'. $rowList['AULA'].'</td>
								<td>'. $rowList['TURMA'].'</td>
								<td>'. $rowList['DATA'].'</td>
								<td name="update"><a href="../../php/updateAgenda.php?codigo='.$rowList['CODIGO'].'"><img src="../../img/edit-file.png" width="30"></a></td>
								<td name="delete"><img src="../../img/delete.png" width="30" onclick="excluir('.$rowList['CODIGO'].')"></td>
							 </tr>';
				   $count++;
				}
				return $array;
		}
               
            public function listarUserComum($codigo,$dia,$cpf){
                $con = $this->openConnection();
                $sql="SELECT RESERVA.CODIGO AS CODIGO,DATE_FORMAT(RESERVA.DATA_ULTILIZAR,'%d/%m/%Y') AS DATA, USUARIO.NOME AS NOME, EQUIPAMENTO.DESCRICAO AS EQUIPAMENTO, AULA.DESCRICAO AS AULA, TURMA.DESCRICAO AS TURMA FROM RESERVA
                        INNER JOIN EQUIPAMENTO ON EQUIPAMENTO.CODIGO = RESERVA.EQUIPAMENTO_CODIGO 
                        INNER JOIN USUARIO ON RESERVA.USUARIO_CPF = USUARIO.CPF
                        INNER JOIN AULA ON RESERVA.AULA_CODIGO = AULA.CODIGO
                        INNER JOIN TURMA ON RESERVA.TURMA_CODIGO = TURMA.CODIGO WHERE AULA_CODIGO ". $codigo ." AND DATA_ULTILIZAR = :DIA AND USUARIO_CPF = :CPF ORDER BY AULA ASC ";
                        $tpmt = $con->prepare($sql);
                        $tpmt->bindValue(":DIA",$dia);
                        $tpmt->bindValue(":CPF",$cpf);
                        $tpmt->execute();
                        $query = $tpmt->fetchAll(PDO::FETCH_ASSOC);
                        $array = array();
                        $count = 0;
                        foreach ($query as $rowList){
                            $array[$count] = '<tr id="linha'.$rowList['CODIGO'].'">
                                            <td>'.$rowList['NOME'].'</td>
                                            <td>'.$rowList['EQUIPAMENTO'].'</td>
                                            <td>'. $rowList['AULA'].'</td>
                                            <td>'. $rowList['TURMA'].'</td>
                                            <td>'. $rowList['DATA'].'</td>
                                            <td name="update"><a href="../../php/updateAgenda.php?codigo='.$rowList['CODIGO'].'"><img src="../../img/edit-file.png" width="30"></a></td>
                                            <td name="delete"><img src="../../img/delete.png" width="30" onclick="excluir('.$rowList['CODIGO'].')"></td>
                                                     </tr>';
                               $count++;
                            }
                         return $array;
            }
            
         public function pesquisaEquipamentos($equipamento,$dia){
             $con1 = $this->openConnection();
             $con2 = $this->openConnection();
             $array = array();
                $c=0; 
                for ($i=1; $i <= 9; $i++) {
                $sqlTest ="SELECT count(AULA_CODIGO) AS QTD FROM RESERVA WHERE EQUIPAMENTO_CODIGO = :EQUIPAMENTO AND DATA_ULTILIZAR = :DIA AND AULA_CODIGO = :I"; 
                $sqlQtd = "SELECT * FROM EQUIPAMENTO WHERE CODIGO = :EQUIPAMENTO";
                $tpmt1 = $con1->prepare($sqlQtd);
                $tpmt1->bindValue(":EQUIPAMENTO",$equipamento);
                $tpmt1->execute();
                $query_qtd = $tpmt1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($query_qtd as $rowQtd) {
                    $tpmt2 = $con2->prepare($sqlTest);
                    $tpmt2->bindValue(":EQUIPAMENTO",$equipamento);
                    $tpmt2->bindValue(":DIA",$dia);
                    $tpmt2->bindValue(":I",$i);
                    $tpmt2->execute();
                        $query_test = $tpmt2->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($query_test as $rowTest) {
                                if($rowTest['QTD'] >= $rowQtd['QUANTIDADE']){
                                                $array[$c] = $i;
                                                $c++; 
                                                }
                                }
                        }
                }
                return $array;
            }
        
            public function removerFiltro($cpf){
                $con = $this->openConnection();
                $sql="SELECT RESERVA.CODIGO AS CODIGO,DATE_FORMAT(RESERVA.DATA_ULTILIZAR,'%d/%m/%Y') AS DATA, USUARIO.NOME AS NOME, EQUIPAMENTO.DESCRICAO AS EQUIPAMENTO, AULA.DESCRICAO AS AULA, TURMA.DESCRICAO AS TURMA FROM RESERVA
                INNER JOIN EQUIPAMENTO ON EQUIPAMENTO.CODIGO = RESERVA.EQUIPAMENTO_CODIGO 
                INNER JOIN USUARIO ON RESERVA.USUARIO_CPF = USUARIO.CPF
                INNER JOIN AULA ON RESERVA.AULA_CODIGO = AULA.CODIGO
                INNER JOIN TURMA ON RESERVA.TURMA_CODIGO = TURMA.CODIGO WHERE USUARIO_CPF = :CPF ORDER BY AULA ASC";
                $tpmt = $con->prepare($sql);
                $tpmt->bindValue(":CPF",$cpf);
                $tpmt->execute();
                $query = $tpmt->fetchAll(PDO::FETCH_ASSOC);
                
                $array = array();
                $count = 0;
                foreach ($query as $rowList){
                $array[$count] = '<tr id="linha'.$rowList['CODIGO'].'">
                                <td>'.$rowList['NOME'].'</td>
                                <td>'.$rowList['EQUIPAMENTO'].'</td>
                                <td>'. $rowList['AULA'].'</td>
                                <td>'. $rowList['TURMA'].'</td>
                                <td>'. $rowList['DATA'].'</td>
                                <td name="update"><a href="../../php/updateAgenda.php?codigo='.$rowList['CODIGO'].'"><img src="../../img/edit-file.png" width="30"></a></td>
                                <td name="delete"><img src="../../img/delete.png" width="30" onclick="excluir('.$rowList['CODIGO'].')"></td>
                                         </tr>';
                   $count++;
                }
                return $array;
            }
	}
?>