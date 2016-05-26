<?php 
		
		$obj = new noticia();
		$obj->setId($_GET['id']);		
		
		if($obj->Excluir()){
			
			replace('painel.php?m=noticias&a=listarNoticias');
			
		}else{
			echo "Erro ao excluir noticia!";
		}
?>