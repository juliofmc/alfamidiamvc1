<?php

		$usuario = trim($_POST['usuario']);
		$nome  = trim($_POST['nome']);
		$senha = trim($_POST['senha']);
		$confirmacao = trim($_POST['confirmacao']);
		$id = $_POST['id'];
		
		if(empty($nome)){
			echo "Preencha o nome!";
			echo "<a href=\"#\" onclick=\"history.go(-1)\">Voltar</a>";			
			exit();
		}				
		
		if(empty($usuario)){
			echo "Preencha o usuario!";
			echo "<a href=\"#\" onclick=\"history.go(-1)\">Voltar</a>";
			exit();
		}
		
		
		if(($senha != $confirmacao) && !empty($senha)){
			echo "senha e confirmacao não conferem!";
			echo "<a href=\"#\" onclick=\"history.go(-1)\">Voltar</a>";			
			exit();			
		}
		
		
		$obj  = new usuario();
		$obj->setArquivo($_FILES['foto']);
		$obj->setCaminho('conteudos/fotos/');
		$obj->setNome($nome);
		
		if(!empty($senha)){
			$obj->setSenha(md5($senha));
		}
		
		$obj->setUsuario($usuario);
		$obj->setArquivoAntigo($_POST['fotoAntiga']);
		$obj->setId($id);
		
		if($obj->Atualizar()){
			
			echo "Usuario atualizado com sucesso!<br>";
			echo "Deseja cadastrar um novo usuario <a href=\"painel.php?m=usuarios&a=novoUsuario\">SIM</a> ou <a href=\"painel.php?m=usuarios&a=listarUsuarios\">NAO</a>";
			
		}else{
			
			echo "Erro ao atualizar!<br>";
		}

?>