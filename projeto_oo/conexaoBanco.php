<?php
	if(!mysql_connect('localhost','root','')){ // Comando mysql do php para conectar-se a um servidor
		echo "Erro de conexão com o banco de dados!";
		exit();
	}


	if(!mysql_select_db('aulaphp')){ // Comando mysql do php para conectar-se a um banco de dados
		echo "Erro ao selecionar o banco de dados!!";
		exit();
	}

?>