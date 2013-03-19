<?php

class RepositorioProdutoReservado extends RepositorioEntidade {

	public static $NM_REPOSITORIO = "RepositorioProdutoReservado";

	public function RepositorioProdutoReservado(){
		parent::__construct(ProdutoReservado::$NM_ENTITY);
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
			array_push($objs, ProdutoReservado::fromArray($item));
		}
		return $objs;
	}
}