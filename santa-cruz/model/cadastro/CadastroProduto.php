<?php

class CadastroProduto extends CadastroEntidade {

	private $NM_CADASTRO = "CadastroProduto";
	
	public function CadastroProduto($fachada){
		parent::__construct(new RepositorioProduto(), $fachada);
	}
	
	public function cadastrar($produto){
		$this->repositorio->create($produto);
	}
}