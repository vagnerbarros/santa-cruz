<?
class SessionManager {
	
	private static function hash(){
		return sha1(Constants::$_DOMAIN.Constants::$_SYSNAME);
	}
	
	public static function set($p_id, $p_value){
		$mem = $_SESSION[SessionManager::hash()];
		if($mem == null)
			$mem = array();
		
		$_SESSION[SessionManager::hash()][sha1($p_id)] = $p_value;
	}
	
	public static function get($p_id){
		$mem = $_SESSION[SessionManager::hash()];
		$value = null;
		if($mem != null){
			$value = $mem[sha1($p_id)];
		}
		return $value;
	}
	
	//KEYS METHODS
	public static function setKey($p_id, $p_value){
		$keys = $_SESSION[SessionManager::hash()][sha1('keys')];

		if($keys == null)
			$keys = array();

		$_SESSION[SessionManager::hash()][sha1('keys')][sha1($p_id)] = $p_value;
	}

	public static function getKey($p_id){
		$keys = $_SESSION[SessionManager::hash()][sha1('keys')];
		$value = null;
		if($keys != null){
			$value = $keys[sha1($p_id)];
		}
		return $value;
	}

	public static function cleanKey($p_id){
		unset($_SESSION[SessionManager::hash()][sha1('keys')][sha1($p_id)]);
	}
	
	public static function clean(){
		unset($_SESSION[SessionManager::hash()][sha1('keys')]);
	}

	
	//USER METHODS
	public static function cleanUser(){
		unset($_SESSION[SessionManager::hash()][sha1(Usuario::$NM_ENTITY)]);
	}
	
	public static function setUser($user){
		$_SESSION[SessionManager::hash()][sha1(Usuario::$NM_ENTITY)] = $user; 
	}

	public static function getUser(){
		return $_SESSION[SessionManager::hash()][sha1(Usuario::$NM_ENTITY)];
	}
	
	public static function hasUser(){
		return isset($_SESSION[SessionManager::hash()][sha1(Usuario::$NM_ENTITY)]);
	} 
	
	//PROFILE METHODS
	/*
	public static function cleanProfile(){
		unset($_SESSION[SessionManager::hash()][sha1(Profile::$NM_ENTITY)]);
	}
	
	public static function setProfile($perfil){
		$_SESSION[SessionManager::hash()][sha1(Profile::$NM_ENTITY)] = $perfil; 
	}
*/
	/**
	 * 
	 * @return Profile Object
	 */
	/*
	public static function getProfile(){
		return $_SESSION[SessionManager::hash()][sha1(Profile::$NM_ENTITY)];
	}
	*/

}
?>
