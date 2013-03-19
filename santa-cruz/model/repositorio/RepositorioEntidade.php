<?php
abstract class RepositorioEntidade implements IRepositorio{

	private $nm_entidade;
	
	public function __construct($nm_entidade){
		$this->nm_entidade = $nm_entidade;
	}
	
	public function returnByMax($field){
		
		$query = "SELECT * FROM ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." WHERE status = '".Constants::$_ATIVO."' ORDER BY $field DESC LIMIT 0,1 ";
		$result = ConexaoBD::prepare($query);
		$result->execute();
		$this->reportErrors($result);
		$set = $this->mount($result); 
		return $set[0];
	}
	
	public function returnMax($field){
		$result = ConexaoBD::prepare("SELECT max($field) FROM ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." WHERE status = '".Constants::$_ATIVO."'");
		$result->execute();
		$this->reportErrors($result);
		if($item = $result->fetch()) {
			return $item['max($field)'];
		}
		return false;
	}
	
	public function nextId(){
		$result = ConexaoBD::prepare("SELECT max(id) FROM ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade);
		$result->execute();
		$this->reportErrors($result);
		if($item = $result->fetch()) {
			return $item['max(id)'] + 1;
		}
		return false;
	}
	
	public function create($entidade){
		$entidade = $entidade->toArray();
		$fields = array_keys($entidade); 

		$query = "INSERT INTO ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade."(";
		$sep = "";
		foreach($fields as $field){
			$query .= $sep . $field;
			$sep = ", ";
		}
		$query .= " ) VALUES ( ";
		$sep = "";
		foreach($fields as $field){
			$query .= $sep . ":".$field;
			$sep = ", ";
		}
		$query .= " ); ";
		$result = ConexaoBD::prepare($query);
		$index = 1;
		foreach($fields as $field){
			$value = $entidade[$field];
			$result->bindValue(":$field", $value);
		}
		$stts = $result->execute();
		$this->reportErrors($result);
		return $stts;
	}
	
	public function retrieve($entidade){
		$entidade = $entidade->toArray();
		$fields = array_keys($entidade); 
		$query = "SELECT * FROM ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." WHERE id=:id AND status = '".Constants::$_ATIVO."' LIMIT 0,1";
		$result = ConexaoBD::prepare($query);
		$result->bindValue(":id", $entidade['id']);
		$resultset = $result->execute();
		$this->reportErrors($result);
		$set = $this->mount($result); 
		return $set[0];
	}

	public function count($keys){
		$fields = array_keys($keys); 
		$query = "SELECT count(*) FROM ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." WHERE ";
		$sep = "";	
		foreach ($fields as $field){
			$query .= $sep . $field . "=:" . $field;  	
			$sep = " AND ";
		}
		$query.=" AND status = '".Constants::$_ATIVO."' ";
		$result = ConexaoBD::prepare($query);
		foreach ($fields as $field){
			$result->bindValue(":".$field, $keys[$field]);
		}
		
		$result->execute();
		$this->reportErrors($result);
		if($item = $result->fetch()) {
			return $item['count(*)'];
		}
		return false;
	}
	
	public function selectAll(){
		return $this->select(array('1'=>1));	
	}
	
	public function select($keys){
		$fields = array_keys($keys); 
		$query = "SELECT * FROM ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." WHERE ";
		$sep = "";	
		foreach ($fields as $field){
			$query .= $sep . $field . "=:" . $field;  	
			$sep = " AND ";
		}
		$query .=" AND status = '".Constants::$_ATIVO."' ";
		$result = ConexaoBD::prepare($query);
		foreach ($fields as $field){
			$result->bindValue(":".$field, $keys[$field]);
		}
		
		$result->execute();
		$this->reportErrors($result);
		return $this->mount($result);
	}
	
	public function update($entidade){
		$entidade = $entidade->toArray();
		$fields = array_keys($entidade); 
		
		$query = "UPDATE ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." SET ";
		$sep = "";
		foreach($fields as $field){
			if($field != 'id'){
				$query .= $sep . $field . " = :" . $field;
				$sep = ", ";
			} 
		}
		
		$query .= " WHERE id = :id  AND status = '".Constants::$_ATIVO."' ";
		$result = ConexaoBD::prepare($query);
		foreach($fields as $field){
			$result->bindValue(":".$field, $entidade[$field]);
		}
		
		$stts = $result->execute(); 
		$this->reportErrors($result);
		return $stts;
	}
	
	public function delete($entidade){
		$entidade = $entidade->toArray();
		$fields = array_keys($entidade); 
		$query = "UPDATE ".Constants::$_BASE.".".Constants::$_NAMESPACE.$this->nm_entidade." SET status = '".Constants::$_INATIVO."'
		 WHERE id =:id";
		$result = ConexaoBD::prepare($query);
		$result->bindParam(":id", $entidade['id'], PDO::PARAM_INT);
		
		$stts = $result->execute();
		$this->reportErrors($result);
		return $stts;
	}
	
	public function reportErrors($sttm){
		if(true){
			$err = $sttm->errorInfo(); 
			if($err[0]  != 0){
				echo "<br><br>";
				echo "<div>SQL Command: ".$sttm->queryString.";</div>";
				echo "<div>SQL Error: ".$err[2]."</div>";
			}
		}
	}
}
?>