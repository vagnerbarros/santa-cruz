<?php
class TipoPerfil {
	
	public static $_CLIENTE = 'Cliente';
	public static $_FUNCIONARIO = 'Funcionário';
	public static $_ADMIN = 'Administrador';
	
	public static function listaPerfil(){
		$lista = array();
		$lista[0] = TipoPerfil::$_ADMIN;
		$lista[1] = TipoPerfil::$_FUNCIONARIO;
		$lista[2] = TipoPerfil::$_CLIENTE;
		return $lista;
	}
}
?>