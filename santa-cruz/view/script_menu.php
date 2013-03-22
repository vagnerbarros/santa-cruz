 <!-- The JavaScript -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
            $(function() {
				$('#menu li').bind('mouseenter',function(){
					var $elemento = $(this);
					$submenu = $elemento.find('.sub_menu');
					$submenu.css('border','solid 1px #CCCCCC');
					$submenu
						 .stop(true)
						 .animate({
							'width':'150px',
							'height':'150px',
							'left':'0px'
						 },1000,'easeOutBack');
				}).bind('mouseleave',function(){
					var $elemento = $(this);
					$submenu = $elemento.find('.sub_menu');
					$submenu
						 .stop(true)
						 .animate({
							'width':'150px',
							'height':'0px',
							'left':'0px'
						 },500,'easeOutBack');
					$submenu.css('border','none');
				});
            });
        </script>
