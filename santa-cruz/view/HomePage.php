<?php 
class HomePage extends Page {
	
	/**
	 * Constante que representa o ID desta página 
	 * na seção
	 * @var String NM_PAGINA
	 */
	public static $NM_PAGINA = 'HomePage';
	
	/**
	 * (non-PHPdoc)
	 * @see Page::title()
	 */
	public function title($lang){
		return "ClickVest.net | Vista-se com um Click";
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Page::permissions()
	 */
	public function permissions(){
		$this->addPermissao(ACL::all()); //Everybody
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Page::head()
	 */
	public function head($args, $lang){
		
		$this->importCss("view/css/style.css");
		$this->importJs("view/js/script_slide.js");
		$this->importJs("view/js/superfish.js");
		$this->importJs("view/js/jquery.cycle.all.min.js");
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Page::content()
	 */
	public function content($args, $lang){ 
		include 'HomePage_content.php';
	}
	
}
?>
