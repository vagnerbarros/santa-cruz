<?php

class Reserva implements Entidade {
	
	//nome da entidade
	public static $NM_ENTITY = "reserva";
	
	private $id;
	private $id_cliente;
	private $data;
	private $status;
	
	//construtor
	public function Reserva($id, $id_cliente, $data, $status){
		
		$this->setId($id);
		$this->setIdCliente($id_cliente);
		$this->setData($data);
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
		if(!($obj instanceof Reserva))
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
		$hash['id_cliente'] = $this->getIdCliente();
		$hash['data'] = $this->getData();
		$hash['status'] = $this->getStatus();  
		
		return $hash;
	}
	
	/**
	 * Método que transforma uma hash em um objeto do tipo usuario
	 */
	public static function fromArray($hash){
		
		return new Reserva($hash['id'], $hash['id_cliente'], $hash['data'], $hash['status']);
	}
	
	//metodos get
	
	public function getId(){
		return $this->id;
	}
	public function getIdCliente(){
		return $this->id_cliente;
	}
	public function getData(){
		return $this->data;
	}
	public function getStatus(){
		return $this->status;
	}
	
	//metodos set
	public function setId($id){
		$this->id = $id;
	}
	public function setIdCliente($id_cliente){
		$this->id_cliente = $id_cliente;
	}
	public function setData($data){
		$this->data = $data;
	}
	public function setStatus($status){
		$this->status = $status;
	}
}

?>