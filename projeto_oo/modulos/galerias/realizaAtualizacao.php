<?php

		$nome  = trim($_POST['nome']);
		$id = $_POST['id'];
		
		if(empty($nome)){
			echo "Preencha o nome!";
			echo "<a href=\"#\" onclick=\"history.go(-1)\">Voltar</a>";			
			exit();
		}				
		
		
		
		$obj  = new Galeria();
		$obj->setArquivo($_FILES['foto']);
		$obj->setCaminho('conteudos/galerias/');
		$obj->setNome($nome);
		
		$obj->setArquivoAntigo($_POST['fotoAntiga']);
		$obj->setId($id);
		
		if($obj->Atualizar()){
			
			echo "Galeria atualizada com sucesso!<br>";
			echo "Deseja cadastrar uma nova galeria <a href=\"painel.php?m=galerias&a=novaGaleria\">SIM</a> ou <a href=\"painel.php?m=galerias&a=listarGalerias\">NAO</a>";
			
		}else{
			
			echo "Erro ao atualizar!<br>";
		}

?>