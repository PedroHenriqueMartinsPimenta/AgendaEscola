<?php
include_once 'classes/Conexao.class.php';
class ComumDAO extends Conexao{
  public function entrar($cpf, $senhaa){
      $senha = base64_encode($senhaa);
      try{
      $con = $this->openConnection();
      $sql="SELECT * FROM USUARIO WHERE CPF = :CPF";
      $tpmt = $con->prepare($sql);
      $tpmt->bindValue(':CPF',$cpf);
      $tpmt->execute();
		 $result = $tpmt->fetchAll(PDO::FETCH_ASSOC);
		 if ($tpmt->rowCount() > 0) {
		
                 foreach ($result as $row){
		 	if($senha == $row['SENHA'] && $row['ATIVO'] == 1){
				session_start();
				$_SESSION['CPF'] = $row['CPF'];
				$_SESSION['senha'] = $row['SENHA'];
				$_SESSION['PERMISSAO'] = $row['PERMISSAO'];
				$_SESSION['FOTO'] = $row['FOTO'];
								
				if($row['PERMISSAO'] == 0){
					header("location:../html/user");
				}else if($row['PERMISSAO'] == 1){
					header("location:../html/administrador");
				}
			}else{
				header("location:../");
				}
                 }
                  }else{
                  	header("location:../");
                  }
      }catch(PDOException $e){
          echo $e;
      }
  }
  
  public function close(){
      session_start();
	session_destroy();
  }

  public function updateReserva($dataConvertida,$professor,$equipamento,$aula,$turma,$codigo){
      $con = $this->openConnection();
      $sql = "UPDATE RESERVA SET DATA_ULTILIZAR = :DATA, USUARIO_CPF = :PROFESSOR,EQUIPAMENTO_CODIGO = :EQUIPAMENTO,"
              . "AULA_CODIGO = :AULA,TURMA_CODIGO = :TURMA WHERE CODIGO = :CODIGO";
      $tpmt = $con->prepare($sql);
      $tpmt->bindValue(":DATA",$dataConvertida);
      $tpmt->bindValue(":PROFESSOR",$professor);
      $tpmt->bindValue(":EQUIPAMENTO",$equipamento);
      $tpmt->bindValue(":AULA",$aula);
      $tpmt->bindValue(":TURMA",$turma);
      $tpmt->bindValue(":CODIGO",$codigo);
      $result = $tpmt->execute();
      if($result == 1){
          return true;
        }else{
            return false;
        }
  }
  
  public function updateSenha($cpf,$newSenhaa){
      $con = $this->openConnection();
      $newSenha = base64_encode($newSenhaa);
      $sql = "UPDATE USUARIO SET SENHA = :NEWSENHA WHERE CPF = :CPF";
      $tpmt = $con->prepare($sql);
      $tpmt->bindValue(":NEWSENHA",$newSenha);
      $tpmt->bindValue(":CPF",$cpf);
      $result = $tpmt->execute();
      if($result == 1){
          return true;
      }else{
          return false;
      }
  }
}

?>