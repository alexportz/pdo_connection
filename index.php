<?php

	/*CLASSES*/
	class Conexao {
		private $host;
		private $user;
		private $pass;
		private $dbname;
		private $stringCon;

		function __construct($host,$user,$pass,$dbname){
 			$this->host = $host;
			$this->user = $user;
			$this->pass = $pass;
			$this->dbname = $dbname; 
			$this->stringCon = "mysql:host=$this->host;dbname=".$this->dbname;
		}

		public function conecta(){
			try {
 			 	$con = new PDO( $this->stringCon, $this->user, $this->pass);
 			 	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 			 	echo "Conectado com sucesso. <br>";
 			 } catch (PDOException $e) {
 			 	$con = false;
 			 	echo "Falha PDO ".$e->getMessage()."<br>";
 			 } catch (Exception $e){
 			 	$con = false;
 			 	echo "Falha<br>";
 			 }
			return $con;
		}

	}

	// class Inserir {
	// 	private $dados;
	// 	private $tabela;
	// 	private $chaves;
	// 	private $valores;
	// 	private $blind = '*';
	// 	private $conexao;

	// 	function __construct($conexao, $tabela, $dados){
	// 		$this->dados = $dados;
	// 		$this->tabela = $tabela;
	// 		$this->chaves = array_keys($dados);
	// 		$this->valores = array_values($dados);			
	// 	}

	// 	public function insere(){
	// 		$query = "INSERT INTO $this->tabela ($this->chaves) VALUES $this->valores ";
	// 		echo $query;
	// 	}
	// }
	/*END OF CLASSES*/

	/*DEFINICOES*/
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = 'm1-motors_horarios'; 
	/* Fim das definições */

	$myCon = new Conexao($host,$user,$pass,$dbname);
	$myTable = 'funcionarios';
	$myData = array('nome'=>'alex','sobrenome'=>'portz','valor'=>'123');
	// $myInsert = new Inserir($myCon, $myTable, $myData);


	echo "<pre>";
	print_r($myCon);
	echo "</pre>";
	// echo "<pre>";
	// print_r($myInsert);
	// echo "</pre>";

	$c = $myCon->conecta();
	// $i = $myInsert->insere();