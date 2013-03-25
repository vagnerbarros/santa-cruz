<?php
include 'view/topo.php';
include 'imports.php';

//ERROR REPORTING
error_reporting(Constants::$_DEBUG);

//INicializa a sessão
SESSION_START();

//Tenta recuperar a Action e a Page da URL
$action = Proxy::fetchAction();
$page = Proxy::fetchPage();

$lang = Messages::$PT_br; 
?>

<!DOCTYPE html>
<html lang="<?echo $lang;?>">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">    
	
    <title>
    	Click Vest
    	
    	<?php 
		if($page){
			echo " - " . $page->title(null);
		}
		?>
    
    </title>

	<?php 
	if($page){
		$page->head(null);
	}
	?>

    
  </head>

	<body>

		<?php 
		//TRATA A ACTION
		if($action) {
			Proxy::mountAction($action);
					
		//TRATA A PAGINA
		} else {
			?>
			
			<?php
			$hasPopup = Proxy::mountPopup();
			$hasAlert = Proxy::mountAlert();
			Proxy::mountPage($page);
			?>
			
			<?php 
		} 	 
		?>
	</body>
</html>
