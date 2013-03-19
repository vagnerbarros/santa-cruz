<?php

class Perfil implements Entidade {
	
	//nome da entidade
	public static $NM_ENTITY = "perfil";
	
	private $id;
	private $descricao;
	private $status;
	
	//construtor
	public function Perfil($id, $descricao, $status){
		
		$this->setId($id);
		$this->setDescricao($descricao);
		$this->setStatus($status);
	}
	
	/**
	 * 
	 * Método que transforma a entidade em um String
	 */
	public function __toString(){
		return "";
	}
	
	/**
	 * 
	 * Método que compara a entidade a outra entidade do mesmo tipo
	 * @param User $obj
	 * @throws ComparacaoTipoInvalidoException
	 */
	public function compareTo($obj){
		if(!($obj instanceof Perfil))
				throw new InvalidTypeException();
		
		return ($this->getId() == $obj->getId());
	}
	
	/**
	 * 
	 * Método que transforma o objeto em uma Hash 
	 */
	public function toArray(){
		
		$hash = array();
		
		$hash['id'] = $this->getId();
		$hash['descrica'] = $this->getDescricao();
		$hash['status'] = $this->getStatus();  
		
		return $hash;
	}
	
	/**
	 * Método que transforma uma hash em um objeto do tipo usuario
	 */
	public static function fromArray($hash){
		
		return new Perfil($hash['id'], $hash['descricao'], $hash['status']);
	}
	
	//metodos get
	public function getId(){
		return $this->id;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function getStatus(){
		return $this->status;
	}
	
	//metodos set
	public function setId($id){
		$this->id = $id;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function setStatus($status){
		$this->status = $status;
	}
}

?>