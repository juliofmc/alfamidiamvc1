<?php
		$id = $_GET['id'];
		$query = "SELECT *FROM usuarios WHERE id='$id' ";
		$resultado = mysql_query($query);
		$dados = mysql_fetch_array($resultado);
?>

<form action="painel.php?m=usuarios&a=realizaAtualizacao" method="post" enctype="multipart/form-data">
	<table>
    	<tr>
        	<td>
            	<input type="text" name="nome" placeholder="Nome:" value="<?php echo $dados['nome']?>" >
            </td>
        </tr>
        <tr>
        	<td>
            	Foto: <input type="file" name="foto" placeholder="Foto">
            </td>
        </tr>        
    	<tr>
        	<td>
            	<input type="text" name="usuario" placeholder="Usuário:" value="<?php echo $dados['usuario']?>" >
            </td>
        </tr> 
    	<tr>
        	<td>
            	<input type="password" name="senha" placeholder="Senha:" >
            </td>
        </tr>                
    	<tr>
        	<td>
            	<input type="password" name="confirmacao" placeholder="Confirme a senha:" >
            </td>
        </tr>     
        <tr>
        	<td align="right">
            	<input type="hidden" name="id" value="<?=$dados['id']?>">            
                <input type="hidden" name="fotoAntiga" value="<?=$dados['arquivo']?>">
            	<input type="submit" value="Atualizar">
            </td>
        </tr>                   
    </table>
</form>