<?php
	session_name('restrito');
	session_start();

	if($_SESSION['logado']!=true){ // Se não passar pelo validaLogin.php a variavel não terá o valor true

		header('Location: index.php'); // será redirecionado para index.php 
		exit();
	}
	
	include('conexaoBanco.php');
	include('conexaoBancoMySQLI.php');		
	include('includes/funcoes.php');
	include('includes/autoloader.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>Área Restrita</title>
<style>
	html,body{
		padding:0;
		margin:0;
	}
	
	input[type=text]{
		border:solid 1px #000000
		
	}	
</style>

<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

<script src="js/jquery-1.12.3.min.js"></script>
<script src="js/jquery.mask.min.js"></script>
</head>

<body>
		<table width="100%" height="100%" border="1">
        		<tr>
                	<td align="center" bgcolor="#0033FF" height="50px">
        	            	ÁREA RESTRITA
                    </td>
                </tr>
                <tr>
                	<td height="10px" align="right">
                    	Ola <?=utf8_encode($_SESSION['nomeUsuario'])?>!
                        <a href="sair.php">[ Sair ]</a>
                    </td>
                </tr>
                <tr>
                	<td align="center" height="10px">
                    	<a href="painel.php?m=usuarios&a=novoUsuario">[ Novo Usuario ]</a>
                    	<a href="painel.php?m=usuarios&a=listarUsuarios">[ Listar Usuario ]</a>                        
                    	<a href="painel.php?m=noticias&a=novaNoticia">[ Nova Noticia]</a>
                    	<a href="painel.php?m=noticias&a=listarNoticias">[ Listar Noticias]</a>
                        
                    	<a href="painel.php?m=galerias&a=novaGaleria">[ Nova Galeria]</a>
                    	<a href="painel.php?m=galerias&a=listarGalerias">[ Listar Galeria]</a>                        
                                  
                                        
                    </td>
                </tr>
        		<tr>
                	<td align="center">
   						<?php
                        		if( isset($_GET['a'])  && isset($_GET['m']) ){
									include('modulos/'.$_GET['m'].'/'.$_GET['a'].'.php');																
								}
						?>
                    </td>
                </tr>
        		<tr>
                	<td align="center" bgcolor="#0033FF" height="50px">
	                    	RODAPÉ
                    </td>
                </tr>                                
        </table>
        <script>
        		$(document).ready(function(e) {

			              $('.data').mask('99/99/9999'); 
			   
                });
        </script>
</body>
</html>