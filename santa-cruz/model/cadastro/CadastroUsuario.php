<?php

class CadastroUsuario extends CadastroEntidade {

	private $NM_CADASTRO = "CadastroUsuario";
	
	public function CadastroUsuario($fachada){
		parent::__construct(new RepositorioUsuario(), $fachada);
	}
	
	public function cadastrarFuncionario($usuario){
		$this->cadastrar($usuario, TipoPerfil::$_FUNCIONARIO);
	}
	
	public function cadastrarCliente($usuario){
		$this->cadastrar($usuario, TipoPerfil::$_CLIENTE);
	}
	
	//fun��o de cadastro que cria um novo usu�rio com um perfil espec�fico
	private function cadastrar($usuario, $tipo_perfil){
		$usuario->setPerfil($tipo_perfil);
		$this->repositorio->create($usuario);
	}
	
	public function inativar($id){
		$usuario = $this->buscarPorId($id);
		$usuario->setStatus(Constants::$_INATIVO);
		$this->repositorio->update($usuario);
	}
	
	public function atualizar($usuario){
		$this->repositorio->update($usuario);
	}
	
	public function listarCliente(){
		
	}
	
	private function listar($tipo_perfil){
		//return $this->repositorio->
	}
}