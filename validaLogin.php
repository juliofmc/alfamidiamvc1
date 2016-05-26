<?php
		session_name('restrito');
		session_start();
		
		include('conexaoBancoMySQLI.php'); // Inclui a conexão com o banco de dados do arquivo conexaoBanco.php
		
		$usuario = $_POST['usuario'];
		$senha = md5($_POST['senha']);
		
		
	 	$query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha' "; //Instrução mysqli de seleção
		$retorno_query = $conexao->query($query);  // Executa o comando dentro do banco de dados;
		
		$dados = $retorno_query->fetch_assoc(); // Transforma a variavel $dados em um array, onde os indice são os campos do banco de dados;

		
		
		$result =  $retorno_query->num_rows; // Retorna o número de linhas que a consulta retornou
		
		if($result == 0){ // Se não retornou nenhum resultado
			
			echo "Usuario ou senha invalidos!!";
			
		}else{
			
				$_SESSION['logado'] = true;
				$_SESSION['nomeUsuario'] = $dados['nome'];
				header('Location: painel.php'); // Redireciona para o arquivo painel.php
		}
		
	
?>