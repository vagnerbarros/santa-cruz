<?php

class RepositorioReserva extends RepositorioEntidade {

	public static $NM_REPOSITORIO = "RepositorioReserva";

	public function RepositorioReserva(){
		parent::__construct(Reserva::$NM_ENTITY);
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
			array_push($objs, Reserva::fromArray($item));
		}
		return $objs;
	}
}