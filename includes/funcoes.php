<?php
		function voltar($mensagem){
				?>
                	<script>
                    		alert('<?=$mensagem?>');
							history.go(-1);
                    </script>
                <?php			
		}
		
		function replace($url){
			header("Location: $url");
		}
?>