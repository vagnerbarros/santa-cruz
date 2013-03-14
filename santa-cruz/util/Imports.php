<?php
class Imports {
	
	/**
	 * Importa uma Action
	 * @param String $action_name Nome da Action
	 */
	public static function action($action_name){
		require_once("action/".$action_name.".php");
		Proxy::registerAction($action_name);	
	}

	/**
	 * Importa uma Page
	 * @param String $page_name Nome da Page
	 */
	public static function page($page_name){
		require_once("view/".$page_name.".php");
		Proxy::registerPage($page_name);
	}
}	
?>
