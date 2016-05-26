<?php	
			$obj = new noticia();
			$obj->setId($_GET['id']);
			$dados = $obj->Listar();
?>

<form action="painel.php?m=noticias&a=realizaAtualizacao" method="post">
	<table border="1">
    	<tr>
        	<td>
            	<input type="text" name="titulo" placeholder="titulo" value="<?=$dados[0]['titulo']?>" size="100">
            </td>
        </tr>
    	<tr>
        	<td>
            	<textarea name="noticia" class="ckeditor"><?=stripslashes($dados[0]['noticia'])?></textarea>
            </td>
        </tr>        
        <tr>
        	<td>
            	Data de Publicação: <input type="date" name="data_publicacao" class="data" value="<?=$dados[0]['dt']?>">
            </td>
        </tr>
        <tr>
        	<td align="center">
            	<input type="hidden" name="id" value="<?=$dados[0]['id']?>">                        
            	<input type="submit" value="Atualizar">
            </td>
        </tr>
    </table>
</form>