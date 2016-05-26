<?php
		session_name('restrito'); // Inicia a sessão com nome restrito
		session_start(); // inicializa ela e recupera as variaveis contidas nela
		
		session_destroy(); // Destroi a sessão e todas as suas variáveis
		
		header('Location: index.php'); // Redireciona o usuário para a página index.php
?>