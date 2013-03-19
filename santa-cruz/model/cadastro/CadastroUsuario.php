<?php

class CadastroUsuario extends CadastroEntidade {

	private $NM_CADASTRO = "CadastroUsuario";
	
	public function CadastroUsuario($fachada){
		parent::__construct(new RepositorioUsuario(), $fachada);
	}
	
	public function cadastrar($usuario){
		$this->repositorio->create($usuario);
	}
}