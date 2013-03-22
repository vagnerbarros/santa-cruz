<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" href="css/style_topo.css" />

	<?php 
		include 'script_menu.php';
	?>
	
	<script type="text/javascript">
		function submeter() {
			var dig = document.getElementById('txt_busca').value;
			alert(dig.lenght);
			if(dig!=""){
				form_busca.submit();
			}else{
				document.getElementById('txt_busca').focus();
			}
		}
	</script>
	
</head>
<body>
	
	<div class="limite">
	
	<div class="bg_topo">
			<div class="left_topo">
			</div>
			
			<div class="right_topo">
				 
			</div>
			<a class="carrinho" href="carrinho.php">
				<span>14 Itens</span>
			</a>
		
			
			<div class="clr"></div>
			
		</div>
			
	</div>
	
	<div class="limite">
		
		<div class="bg_logo">
			
			<div class="logotipo">
				<img alt="" src="css/img/logo.png" width="175"/>
			</div>
			
			<form action="teste" class="form_busca" id="form_busca" name="form_busca">
				
				<input type="text" id="txt_busca" />
				
				<a onclick="javascript:submeter();"> <img alt="" src="css/img/search.png"/> </a>
				
			</form>
			
		</div>
		
		<div class="bg_menu">
			<ul class="menu" id="menu">
				
				<li><a href="index.php">Início</a></li>
				
				<li>|</li>
				
				<li><a href="">Roupas Masculinas <img alt="" src="css/img/seta_down.png" height="6"/> </a>
					<ul class="sub_menu">
						<li><a href=""> &rsaquo; Social</a></li>
						<li><a href=""> &rsaquo; Passeio Formal</a></li>
					</ul>
				</li>
				
				<li>|</li>
				
				<li><a href="">Roupas Femininas <img alt="" src="css/img/seta_down.png" height="6"/> </a>
					<ul class="sub_menu">
						<li><a href=""> &rsaquo; Social</a></li>
						<li><a href=""> &rsaquo; Passeio Formal</a></li>
					</ul>
				</li>
				
				<li>|</li>
				
				<li><a href="">Meu Perfil</a></li>
				
				<li>|</li>
				
				<li><a href="">Meu Perfil</a></li>
				
				<li>|</li>
				
				<li><a href="">Meu Perfil</a></li>
				
			</ul>
			
			<div class="clr"></div>
		</div>
		
	</div>
</body>
</html>