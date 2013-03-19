<?php

class CadastroReserva extends CadastroEntidade {

	private $NM_CADASTRO = "CadastroReserva";
	
	public function CadastroReserva($fachada){
		parent::__construct(new RepositorioReserva(), $fachada);
	}
	
	public function cadastrar($reserva){
		$this->repositorio->create($reserva);
	}
}