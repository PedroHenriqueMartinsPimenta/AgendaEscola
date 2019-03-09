<?php
class Conexao{
	private  $con;
	private $host="mysql:host=localhost;dbname=agendamento;charset=utf8";
	private $user="root";
	private $password="";
	private $db="agendamento";
	
	public  function openConnection(){
            try{
		$this->con = new PDO($this->host, $this->user, $this->password);
            }catch(PDOException $e){
                echo $e;
            }
		return $this->con;
		}
	
	}
?>