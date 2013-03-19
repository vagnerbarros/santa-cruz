<?php

class RepositorioPerfil extends RepositorioEntidade {

	public static $NM_REPOSITORIO = "RepositorioPerfil";

	public function RepositorioPerfil(){
		parent::__construct(Perfil::$NM_ENTITY);
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
			array_push($objs, Perfil::fromArray($item));
		}
		return $objs;
	}
}