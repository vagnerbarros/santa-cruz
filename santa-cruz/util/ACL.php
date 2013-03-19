<?php
class ACL {
	
	public static $ACL_ADMIN = A;
	public static $ACL_CLIENTE = C;
	public static $ACL_FUNCIONARIO = F;
	public static $ACL_USUARIO = U;
	
	public static function checkProfile($profiles){

		$logged = SessionManager::hasUser() + 0;
		$user = SessionManager::getUser(); 
		$user_profile = null;
		
		if($logged){
			$user_profile = $user->getPermissao();
		}
		
		if($profiles == null) {
			return true;
			
		} else if(is_array($profiles)){
			$ok = false;
			
			foreach($profiles as $profile){
				$ok = $ok || (((!$logged) && (ACL::$ACL_USUARIO == $profile)) || (($logged) && ($user_profile == $profile)));
			}
			return $ok;
			
		} else {
			
			$ok = ((!$logged) && (ACL::$ACL_USUARIO == $profiles)) || (($logged) && ($user_profile == $profiles));
			return $ok; 

		}
	}

	/*
	public static function getProfile(){
		
		$profile = ''.SessionManager::getProfile();
		
		echo "[$profile] ";

		$label = array();
		$label[ACL::$ACL_VISITOR] = "Visitor"; 
		
		return $label[$profile];
				
	}
	*/
	
	public static function all(){
		$all = array();
		$all[] = ACL::$ACL_ADMIN;
		$all[] = ACL::$ACL_USUARIO;
		$all[] = ACL::$ACL_CLIENTE;
		$all[] = ACL::$ACL_FUNCIONARIO;
		return $all;
	}
	
	public static function allButOne($who){
		$allButOne = array();
		
		if($who != ACL::$ACL_ADMIN)
			$allButOne[] = ACL::$ACL_ADMIN;
		if($who != ACL::$ACL_USUARIO)
			$allButOne[] = ACL::$ACL_USUARIO;
		if($who != ACL::$ACL_CLIENTE)
			$allButOne[] = ACL::$ACL_CLIENTE;
		if($who != ACL::$ACL_FUNCIONARIO)
			$allButOne[] = ACL::$ACL_FUNCIONARIO;
		
		return $allButOne;
	}
}
?>