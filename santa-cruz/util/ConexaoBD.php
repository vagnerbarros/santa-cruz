<?php
class ConexaoBD {

	private static $conexao;

	private function ConexaoBD ($p_host, $p_user, $p_pass, $p_base){
		$opcoes = array(
		    PDO::ATTR_PERSISTENT => true,
		    PDO::ATTR_CASE => PDO::CASE_LOWER
		);
		
		try {
			$conn = "mysql:host=$p_host;port=3306;dbname=$p_base";
			$this->conexao = new PDO($conn, $p_user, $p_pass, $options);
			//echo "<div>conectou!</div>";
		} catch (PDOException $ex){
			
		}
		
		
	}

	public function getInstance(){
		if(ConexaoBD::$conexao == null) {
			ConexaoBD::$conexao = new ConexaoBD (Constants::$_HOST, Constants::$_USER, Constants::$_PASS, Constants::$_BASE);
		}
		
		return ConexaoBD::$conexao;
	}

	public function nextId($entidade){
		
		$query = "SELECT max(id) FROM ? ";
		$stmt = prepare($query);
		
		$reg = mysql_fetch_array($this->doSQL($query));
		$sequencial = $reg[$max]+1;
		return $sequencial;
	}

	public static function prepare($p_query){
		$conn = ConexaoBD::getInstance()->conexao;
		return $conn->prepare($p_query);
	}

}

?>
