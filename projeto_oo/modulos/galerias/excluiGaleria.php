<?php 
		$id = $_GET['id'];
		$query = " DELETE FROM galerias WHERE id='$id' ";
		
		if(mysql_query($query)){
			@unlink('conteudos/galerias/'.$_GET['foto']);
			replace('painel.php?m=galerias&a=listarGalerias');
			
		}else{
			echo "Erro ao excluir o usuario!";
		}
?>