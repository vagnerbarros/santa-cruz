<?php
class CadastroEntidade {

	protected $repositorio;
	protected $fachada;
	
	public function __construct($repositorio, $fachada){
		$this->repositorio = $repositorio;
		$this->fachada = $fachada;
	}
	
}