<?php
abstract class Page {
	
	private $permissoes;

	/**
	 * Construtor padr�o
	 */
	public function __construct(){
		$this->permissoes = array();
		$this->permissions();
	}

	/**
	 * Adiciona uma permiss�o de acesso a esta p�gina 
	 * @param int/array $acl N�vel/N�veis de acesso
	 */
	public function addPermissao($acl){
		if(is_array($acl )){
			foreach ($acl as $a) {
				$this->permissoes[] = $a;
			}			
		} else {
			$this->permissoes[] = $acl;
		}
	}
	
	/**
	 * @return Retorna as permiss�es de acesso a esta p�gina 
	 */
	public function getPermissoes(){
		return $this->permissoes;
	}
	
//	/**
//	 * Importa uma Action
//	 * @param String $action_name Nome da Action
//	 */
//	public function dependsOnAction($action_name){
//		require_once("action/".$action_name.".php");
//		Proxy::registerAction($action_name);	
//	}

//	/**
//	 * Importa uma Page
//	 * @param String $page_name Nome da Page
//	 */
//	public function dependsOnPage($page_name){
//		require_once("view/".$page_name.".php");
//		Proxy::registerPage($page_name);
//	}
	
	/**
	 * Importa um arquivo de JavaScript
	 * @param String $file Endere�o do arquivo JavaScript (.js)
	 */
	public function importJs($file){
		echo "<script src='".$file."'></script>";
	}
	
	/**
	 * Importa uma Folha de Estilos
	 * @param String $file Endere�o do arquivo de Folha de Estilo (.css)
	 */
	public function importCss($file){
		echo "<link href='".$file."' rel='stylesheet'>";
	}
	
	/**
	 * Este m�todo configura o t�tulo 
	 * que aparecer� na p�gina HTML 
	 * 
	 * @param String $lang Par�metro da internacionaliza��o
	 * @return String T�tulo
	 */
	public abstract function title($lang);
	
	/**
	 * M�todo que configura o n�vel de acesso
	 * a esta p�gina.
	 * 
	 * @see Page::addPermissao($acl)
	 */
	public abstract function permissions();

//	/**
//	 * M�todo que importa as pages e action utilizadas
//	 * nesta p�gina.
//	 * 
//	 */
//	public abstract function dependencies();

	/**
	 * 
	 * Este m�todo imprime as tags do HEAD desta p�gina.
	 * 
	 * @param array $args Argumentos GET enviados para esta p�gina.
	 * @param String $lang Par�metro da internacionaliza��o.  
	 */
	public abstract function head($args, $lang);
	
	/**
	 * 
	 * Esta p�gina imprime o conteudo desta p�gina.
	 * 
	 * @param array $args Argumentos GET enviados para esta p�gina.
	 * @param String $lang Par�metro da internacionaliza��o. 
	 */
	public abstract function content($args, $lang);
	
}