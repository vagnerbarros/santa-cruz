<?php
class Proxy {

	private static $_PAGE = 'p';
	private static $_ACTION = 'a';
	
	private static $default = 'HomePage';
	private static $pagelist;
	private static $actionlist;
	private static $key;
	
	public static function pagename(){
		return $_GET[Proxy::encrypt(Proxy::$_PAGE)];		
	}
	
	public static function page($page, $keys=null){
		
		$link = "index.php?".Proxy::encrypt(Proxy::$_PAGE)."=".Proxy::encrypt($page);
		
		if($keys != null){
			$sep = "&";  
			$fields = array_keys($keys);
			foreach($fields as $field){
				$link = $link . $sep . $field . "=" . $keys[$field];
			}
		}
		
		return $link;
	}
	
	public static function internal($page, $keys=null){
		
		$link = "internal.php?".Proxy::encrypt(Proxy::$_PAGE)."=".Proxy::encrypt($page);
		
		if($keys != null){
			$sep = "&";  
			$fields = array_keys($keys);
			foreach($fields as $field){
				$link = $link . $sep . $field . "=" . $keys[$field];
			}
		}
		
		return $link;
	}
	
	public static function action($nm_action, $keys=null){
		
		$link = "index.php?".Proxy::encrypt(Proxy::$_ACTION)."=".Proxy::encrypt($nm_action);
		
		if($keys != null){
			$sep = "&";  
			$fields = array_keys($keys);
			foreach($fields as $field){
				$link = $link . $sep . $field . "=" . $keys[$field];
			}
		}
		
		return $link;
	}
	
	public static function reset(){
		Proxy::$key = time();
		Proxy::$pagelist = array();
		Proxy::$actionlist = array();
	}
	
	public static function registerPage($nm_page){
		Proxy::$pagelist[Proxy::encrypt($nm_page)] = $nm_page;
		
	}
	
	public static function registerAction($nm_action){
		Proxy::$actionlist[Proxy::encrypt($nm_action)] = $nm_action;
	}
	
	
	/**
	 * Método que tenta instanciar uma Page, caso exista.
	 */
	public static function fetchPage(){
		$page = null;
		
		$pageid = Proxy::pagename();
		if(empty($pageid))
			$pageid = Proxy::encrypt(Constants::$_DEFAULT_PAGE);
		
		if($pageid){
			
			//Pega o nome da Page
			$nm_page = Proxy::$pagelist[$pageid];
			
			//GRAVA O LOG
			Proxy::log($nm_page);
			
			//Instancia a Page
			$page = new $nm_page;
		}
		
		return $page;
	}
	
	/**
	 * Método que tenta instanciar uma Action, caso exista.
	 */
	public static function fetchAction(){
		$action = null;
		$actionid = !empty($_GET[Proxy::encrypt(Proxy::$_ACTION)]) ? $_GET[Proxy::encrypt(Proxy::$_ACTION)] : null ;
		if($actionid){
			
			//Pega o nome da Action
			$nm_action = Proxy::$actionlist[$actionid];
			
			//GRAVA O LOG
			Proxy::log($nm_action);
			 
			//Instancia a Action
			$action = new $nm_action;
		}
		return $action;
	} 

	/**
	 * 
	 * Método que monta uma Page
	 * 
	 * @param Page $page Page a ser montada na tela.
	 */
	public static function mountPage($page){
		$args = Proxy::mountForm();
		
		if($page){
			
			$access = ACL::checkProfile($page->getPermissoes());
			if($access) {
				
				$page->content($args);
				Proxy::mountPopup();
				Proxy::mountAlert();
				
			} else {
				Proxy::acessoRestrito();
			}
			unset($_GET[Proxy::encrypt('p')]);
				
		} else {
			
			Proxy::paginaInexistente();
		}
		
	}

	public static function mountPopup(){
		//show alert
		$popup = SessionManager::getKey('popup');
		SessionManager::cleanKey('popup');
		$hasPopup = ($popup != null && $popup != '');
		if($hasPopup){
			?>
			<a id="popup" href="<?php echo Proxy::internal($popup)?>" title="" style="display:none">Popup</a>
			<?php 
		}
		return $hasPopup;
	}		
	
	/**
	 * Método que monta a mensagem de alerta.
	 * 
	 */
	public static function mountAlert(){
		//show alert
		$msg = SessionManager::getKey('bodymsg');
		SessionManager::cleanKey('bodymsg');
		$hasMessage = ($msg != null && $msg != '');
		if($hasMessage){
			$tp = SessionManager::getKey('bodymsgtype'); 
			SessionManager::cleanKey('bodymsgtype');
			?>
			<a id="msg" href="#alert" title="" style="display:none">Alert</a>
			<div style="display: none;"  >
				<div id="alert" style="width:400px;height:100px;overflow:auto;" class="alert <?php echo $tp?>">
					<?php print_r($msg);?>
				</div>
			</div>
			<?php 
		}
		return $hasMessage;
	}		
	
	
	/**
	 * 
	 * Método que executa uma Action
	 * @param Action $action Action a ser executada
	 * 
	 */
	public static function mountAction($action){
		$args = Proxy::mountForm();
		
		if($action){
			$access = ACL::checkProfile($action->getPermissions());
			if($access) {

				try {
					
					?>
					<script language="javascript">
					function load(i) {
						document.getElementById("bar").style.width=i;
					};
					</script>						
					<div class='container'>
						<div class='row span5 offset3'>
							<div class="progress progress-striped active">
								<div id='bar' class="bar" style="width: 0%;"></div>
							</div>
						</div>
					</div>
					<?php
					 
					$action->run($args);

					if($action->hasMessage()){
						SessionManager::setKey('bodymsg', $action->getMessage());
						SessionManager::setKey('bodymsgtype', $action->getMessageType());
					}
					
					if($action->hasPopup()){
						SessionManager::setKey('popup', $action->getPopup());
					}
					
					Forward::go($action->getForward());
					
				} catch (Exception $e){
					SessionManager::setKey('bodymsg', "[ERRO] ".$e->getMessage());
					SessionManager::setKey('bodymsgtype', Constants::$_MSG_ERRO);
					Forward::go(Forward::$_BACK);
				} 
			}
		}
	}
	
	/**
	 * 
	 * Este método monta um array com as chaves baseadas
	 * nos parâmetros passados pela URL (GET) 
	 * ou pelo método POST. 
	 */
	private static function mountForm(){
		$form = new Form();

		//MOUNT FORM
		$kps = array_keys($_POST);
		foreach($kps as $key){
			$form->set($key, $_POST[$key]);
			unset($_POST[$key]);	
		}
		
		//MOUNT FORM 
		$kgs = array_keys($_GET);
		foreach($kgs as $key){
			$form->set($key, $_GET[$key]);
			unset($_GET[$key]);	
		}
		
		//MOUNT FORM
		if(is_array($_FILES)){
			$kfs = array_keys($_FILES);
			foreach($kfs as $key){
				$form->set($key, $_FILES[$key]);
				unset($_FILES[$key]);	
			}
		}		
		
		return $form;
	}
	
	/**
	 * 
	 * Grava o log das ações do usuário 
	 * 
	 * @param String $action Page ou Action acessada pelo usuário
	 */
	private static function log($action){
		//TODO: implement
	}
	

	/**
	 * 
	 * Método que imprime a mensagem de controle de acesso,
	 * caso algum usuário tente acessar uma página à qual não 
	 * tem permissão.
	 *  
	 */
	private static function acessoRestrito(){
		
		$logged = SessionManager::hasUser();
		
		if($logged) {
			SessionManager::setKey('bodymsg', "Você não tem permissão suficiente para acessar esta página.");
			SessionManager::setKey('bodymsgtype', Constants::$_MSG_ERRO);
			Forward::go(Forward::$_BACK);
			
		} else {
			SessionManager::setKey('bodymsg', "Entre com os seus dados de acesso para visualizar esta página.");
			SessionManager::setKey('bodymsgtype', Constants::$_MSG_ERRO);
			Forward::go(HomePage::$NM_PAGINA);
		}
	}
	
	/**
	 * 
	 * Método que imprime a mensagem de página inexistente, 
	 * caso alguma página inexistente seja acessada.
	 *  
	 */
	private static function paginaInexistente(){
		SessionManager::setKey('bodymsg', "Página Inexistente! A página que você tentou acessar não está disponível neste servidor.");
		SessionManager::setKey('bodymsgtype', Constants::$_MSG_ERRO);
		Forward::go(Forward::$_BACK);
	}
	
	/**
	 * 
	 * Protege do Proxy do acesso a alguma página desconhecida.
	 * 
	 * @param String $incfile Nome do arquivo a ser acessado
	 * @param boolean $showfn Booleano que indica se o nome da página deve ou não ser exibida. Deafult = 1.
	 */
	private static function safe_require( $incfile, $showfn=1 ) {
	  $a = explode( ":", get_include_path() ) ;
	  $a[] = "";
	  $b = 0;
	  foreach( $a as $p ) {
	    if( !empty( $p )) $p .= "/";
	    $f = $p.$incfile;
	    if( file_exists( $f )) {
	      $b = 1;
	      break;
	    }
	  }
	  if( !$b ) 
	    exit( "404 Not found!<br>" . 
	          (($showfn) ? $incfile : "" ) . " não está disponível neste servidor." 
	        );
	       
	  include( "$f" );
	  return true;
	}
	
	/**
	 * 
	 * Criptografa um dado String
	 * Este método deve ser utilizado para encriptar nomes de páginas
	 * e de chaves de parâmetros de URL.
	 * 
	 * @param String $str
	 * @return String $str encriptado
	 * 
	 */
	public static function encrypt($str){
		//return sha1($str);
		return $str;
	}
}

?>
