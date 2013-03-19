<?php

class RepositorioProduto extends RepositorioEntidade {

	public static $NM_REPOSITORIO = "RepositorioProduto";

	public function RepositorioProduto(){
		parent::__construct(Produto::$NM_ENTITY);
	}
	
	public function selectById($id){
		$keys['id'] = $id;
		$keys['ativo'] = Constants::$_ATIVO;
		$result = $this->select($keys);
		return $result[0];
	}
	
	public function mount($resultSet){
		$objs = array();
		while ($item = $resultSet->fetch()) {
			array_push($objs, Produto::fromArray($item));
		}
		return $objs;
	}
}