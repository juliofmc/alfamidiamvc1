<?php
		$nome  = trim($_POST['nome']);
		
		if(empty($nome)){
			voltar('Preencha o nome!');
			exit();
		}				
		
		
		$obj  = new Galeria();
		$obj->setArquivo($_FILES['foto']);
		$obj->setCaminho('conteudos/galerias/');
		$obj->setNome($nome);
		if($obj->Cadastrar()){
			
			echo "Galeria cadastrada com sucesso!<br>";
			echo "Deseja cadastrar uma nova galeria <a href=\"painel.php?m=galerias&a=novaGaleria\">SIM</a> ou <a href=\"painel.php?m=galerias&a=listarGalerias\">NAO</a>";
			
		}else{
			
			echo "Erro ao cadastrar!<br>";
		}
		

	
?>