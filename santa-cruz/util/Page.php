<?php
abstract class Page {
	
	private $permissoes;

	/**
	 * Construtor padrão
	 */
	public function __construct(){
		$this->permissoes = array();
		$this->permissions();
	}

	/**
	 * Adiciona uma permissão de acesso a esta página 
	 * @param int/array $acl Nível/Níveis de acesso
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
	 * @return Retorna as permissões de acesso a esta página 
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
	 * @param String $file Endereço do arquivo JavaScript (.js)
	 */
	public function importJs($file){
		echo "<script src='".$file."'></script>";
	}
	
	/**
	 * Importa uma Folha de Estilos
	 * @param String $file Endereço do arquivo de Folha de Estilo (.css)
	 */
	public function importCss($file){
		echo "<link href='".$file."' rel='stylesheet'>";
	}
	
	/**
	 * Este método configura o título 
	 * que aparecerá na página HTML 
	 * 
	 * @param String $lang Parâmetro da internacionalização
	 * @return String Título
	 */
	public abstract function title($lang);
	
	/**
	 * Método que configura o nível de acesso
	 * a esta página.
	 * 
	 * @see Page::addPermissao($acl)
	 */
	public abstract function permissions();

//	/**
//	 * Método que importa as pages e action utilizadas
//	 * nesta página.
//	 * 
//	 */
//	public abstract function dependencies();

	/**
	 * 
	 * Este método imprime as tags do HEAD desta página.
	 * 
	 * @param array $args Argumentos GET enviados para esta página.
	 * @param String $lang Parâmetro da internacionalização.  
	 */
	public abstract function head($args, $lang);
	
	/**
	 * 
	 * Esta página imprime o conteudo desta página.
	 * 
	 * @param array $args Argumentos GET enviados para esta página.
	 * @param String $lang Parâmetro da internacionalização. 
	 */
	public abstract function content($args, $lang);
	
}