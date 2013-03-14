<?php
 //EXCEPTIONS
// require_once("model/exception/CaptchaIncorretoException.php");
  
 //DOMINIOS
 
 
 //ENTIDADES
// require_once("model/entidades/Usuario.php");

 //REPOSITORIOS
// require_once("model/repositorio/IRepositorio.php");
 
 //CADASTROS
// require_once("model/cadastro/CadastroEntidade.php");
 

class Fachada {

	private static $instance;
	private $cadastros;
	
	private function __construct(){
		$this->cadastros = array();
//		$this->cadastros[Usuario::$NM_ENTITY] = new CadastroUsuario($this);
	}
	
	public function getInstance(){
		if(Fachada::$instance == null) {
			Fachada::$instance = new Fachada ();
		}
		return Fachada::$instance;
	}
}

?>