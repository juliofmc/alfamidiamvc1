<?php 
		$id = $_GET['id'];
		$query = " DELETE FROM usuarios WHERE id='$id' ";
		
		if(mysql_query($query)){
			@unlink('conteudos/fotos/'.$_GET['foto']);
			replace('painel.php?m=usuarios&a=listarUsuarios');
			
		}else{
			echo "Erro ao excluir o usuario!";
		}
?>