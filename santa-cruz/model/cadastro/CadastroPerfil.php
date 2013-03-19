<?php

class CadastroPerfil extends CadastroEntidade {

	private $NM_CADASTRO = "CadastroPerfil";
	
	public function CadastroPerfil($fachada){
		parent::__construct(new RepositorioPerfil(), $fachada);
	}
	
	public function cadastrar($perfil){
		$this->repositorio->create($perfil);
	}
}