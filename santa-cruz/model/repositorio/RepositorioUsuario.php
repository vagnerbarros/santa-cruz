<?php

class RepositorioUsuario extends RepositorioEntidade {

	public static $NM_REPOSITORIO = "RepositorioUsuario";

	public function RepositorioUsuario(){
		parent::__construct(Usuario::$NM_ENTITY);
	}
	
	public function selectById($id){
		$keys['id'] = $id;
		$keys['ativo'] = Constants::$_ATIVO;
		$result = $this->select($keys);
		return $result[0];
	}
	
	public function selectBy
	
	public function mount($resultSet){
		$objs = array();
		while ($item = $resultSet->fetch()) {
			array_push($objs, Usuario::fromArray($item));
		}
		return $objs;
	}
}