<?
class Forward {
	
	public static $_BACK = '-1';
	public static $_BLOCK = '0';
	
	public static function goURL($url){
		echo
		"<script type='text/javascript'>
			<!--
			window.parent.location.replace('$url');
			//-->
			</script>
			";
	}

	public static function goBack(){
		echo
		"<script type='text/javascript'>
			<!--
			window.history.back();
			//-->
			</script>
			";
	}

	
	public static function go($nm_page){
		if($nm_page == Forward::$_BACK) {
			Forward::goBack();
			
		} else if($nm_page == Forward::$_BLOCK) {
			//fica parado
			
		} else {	
			Forward::goURL(Proxy::page($nm_page));
			
		}
	}
	
}
?>
