<?php
		$usuario = trim($_POST['usuario']);
		$nome  = trim($_POST['nome']);
		$senha = trim($_POST['senha']);
		$confirmacao = trim($_POST['confirmacao']);
		
		if(empty($nome)){
			voltar('Preencha o nome!');
			exit();
		}				
		
		if(empty($usuario)){
			voltar('Preencha o usuario');
			exit();
		}
		
		if(empty($senha)){
			voltar('Preencha a senha');
			exit();
		}		
		
		if($senha != $confirmacao){
			voltar('Senha e confirmação não conferem');
			exit();			
		}
		
			
		$obj  = new usuario();
		$obj->setArquivo($_FILES['foto']);
		$obj->setCaminho('conteudos/fotos/');
		$obj->setNome($nome);
		$obj->setSenha(md5($senha));
		$obj->setUsuario($usuario);
		
		if($obj->Cadastrar()){
			
			echo "Usuario cadastrado com sucesso!<br>";
			echo "Deseja cadastrar um novo usuario <a href=\"painel.php?m=usuarios&a=novoUsuario\">SIM</a> ou <a href=\"painel.php?m=usuarios&a=listarUsuarios\">NAO</a>";
			
		}else{
			
			echo "Erro ao cadastrar!<br>";
		}
		

	
?>