<?php

class Usuario implements Entidade {
	
	//nome da entidade
	public static $NM_ENTITY = "usuario";
	
	private $id;
	private $perfil;
	private $nome;
	private $login;
	private $senha;
	private $status;
	
	//construtor
	public function Usuario($id, $perfil, $nome, $login, $senha, $status){
		
		$this->setId($id);
		$this->setIdPerfil($perfil);
		$this->setNome($nome);
		$this->setLogin($login);
		$this->setSenha($senha);
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
		if(!($obj instanceof Usuario))
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
		$hash['perfil'] = $this->getPerfil();
		$hash['nome'] = $this->getNome();
		$hash['login'] = $this->getLogin();
		$hash['senha'] = $this->getSenha();
		$hash['status'] = $this->getStatus();  
		
		return $hash;
	}
	
	/**
	 * Método que transforma uma hash em um objeto do tipo usuario
	 */
	public static function fromArray($hash){
		
		return new Usuario($hash['id'], $hash['perfil'], $hash['nome'], $hash['login'], $hash['senha'], $hash['status']);
	}
	
	//metodos get
	
	public function getId(){
		return $this->id;
	}
	public function getPerfil(){
		return $this->perfil;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getStatus(){
		return $this->status;
	}
	
	//metodos set
	
	public function setId($id){
		$this->id = $id;
	}
	public function setPerfil($perfil){
		$this->perfil = $perfil;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setLogin($login){
		$this->login = $login;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function setStatus($status){
		$this->status = $status;
	}
}

?>