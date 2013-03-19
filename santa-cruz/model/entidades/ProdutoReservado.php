<?php

class ProdutoReservado implements Entidade {
	
	//nome da entidade
	public static $NM_ENTITY = "produto_reservado";
	
	private $id;
	private $id_reserva;
	private $id_produto;
	private $quantidade;
	private $status;
	
	//construtor
	public function ProdutoReservado($id, $id_reserva, $id_produto, $quantidade, $status){
		
		$this->setId($id);
		$this->setIdReserva($id_reserva);
		$this->setIdProduto($id_produto);
		$this->setQuantidade($quantidade);
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
		if(!($obj instanceof ProdutoReservado))
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
		$hash['id_reserva'] = $this->getIdReserva();
		$hash['id_produto'] = $this->getIdProduto();
		$hash['quantidade'] = $this->getQuantidade();
		$hash['status'] = $this->getStatus();  
		
		return $hash;
	}
	
	/**
	 * Método que transforma uma hash em um objeto do tipo usuario
	 */
	public static function fromArray($hash){
		
		return new ProdutoReservado($hash['id'], $hash['id_reserva'], $hash['id_produto'], $hash['quantidade'], $hash['status']);
	}
	
	//metodos get
	public function getId(){
		return $this->id;
	}
	public function getIdReserva(){
		return $this->id_reserva;
	}
	public function getIdProduto(){
		return $this->id_produto;
	}
	public function getQuantidade(){
		return $this->quantidade;
	}
	public function getStatus(){
		return $this->status;
	}
	
	//metodos set
	public function setId($id){
		$this->id = $id;
	}
	public function setIdReserva($id_reserva){
		$this->id_reserva = $id_reserva;
	}
	public function setIdProduto($id_produto){
		$this->id_produto = $id_produto;
	}
	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}
	public function setStatus($status){
		$this->status = $status;
	}
}

?>