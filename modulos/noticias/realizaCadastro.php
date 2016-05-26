<?php
		$titulo = trim($_POST['titulo']);
		$noticia  = trim($_POST['noticia']);
		$dataPublicacao = trim($_POST['data_publicacao']);
		
		if(empty($titulo)){
			voltar('Preencha o titulo!');
			exit();
		}				
		
		if(empty($noticia)){
			voltar('Preencha a noticia');
			exit();
		}
		
		if(empty($dataPublicacao)){
			voltar('Preencha a data de publicacao');
			exit();
		}		
		
		$data = explode('/',$dataPublicacao); 
		$data = implode('-',array_reverse($data));
		
		
		$obj = new noticia();
		$obj->setNoticia($_POST['noticia']);
		$obj->setTitulo($_POST['titulo']);
		$obj->setDataPublicacao($data);
		
		if($obj->Cadastrar())
		{
			echo "Noticia cadastrada com sucesso!<br>";
			echo "Deseja cadastrar uma nova noticia <a href=\"painel.php?m=noticias&a=novaNoticia\">SIM</a> ou <a href=\"painel.php?m=noticias&a=listarNoticias\">NAO</a>";			
		}else{
			echo "Erro ao cadastrar a noticia";
		}
	
	
?>