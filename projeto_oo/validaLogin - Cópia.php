<?php
		session_name('restrito');
		session_start();
		
		include('conexaoBanco.php'); // Inclui a conexão com o banco de dados do arquivo conexaoBanco.php
		
		$usuario = $_POST['usuario'];
		$senha = md5($_POST['senha']);
		
		
	 	$query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha' "; //Instrução mysql de seleção
		$retorno_query = mysql_query($query); // Executa o comando dentro do banco de dados;
		
		$dados = mysql_fetch_array($retorno_query); // Transforma a variavel $dados em um array, onde os indice são os campos do banco de dados;

		
		
		$result =  mysql_num_rows($retorno_query); // Retorna o número de linhas que a consulta retornou
		
		if($result == 0){ // Se não retornou nenhum resultado
			
			echo "Usuario ou senha invalidos!!";
			
		}else{
			
				$_SESSION['logado'] = true;
				$_SESSION['nomeUsuario'] = $dados['nome'];
				header('Location: painel.php'); // Redireciona para o arquivo painel.php
		}
		
	
?>