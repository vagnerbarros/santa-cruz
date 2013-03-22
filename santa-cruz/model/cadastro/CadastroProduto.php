<?php

class CadastroProduto extends CadastroEntidade {

	private $NM_CADASTRO = "CadastroProduto";
	
	public function CadastroProduto($fachada){
		parent::__construct(new RepositorioProduto(), $fachada);
	}
	
	public function cadastrar($produto){
		$this->repositorio->create($produto);
	}
	
	public function inativar($id){
		$produto = $this->buscarPorId($id);
		$produto->setStatus(Constants::$_INATIVO);
		$this->repositorio->update($produto);
	}
	
	public function atualizar($produto){
		$this->repositorio->update($produto);
	}
}