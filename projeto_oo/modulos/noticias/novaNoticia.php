<form action="painel.php?m=noticias&a=realizaCadastro" method="post">
	<table border="0">
    	<tr>
        	<td>
            	<input type="text" name="titulo" placeholder="titulo" size="100">
            </td>
        </tr>
    	<tr>
        	<td>
            	<textarea class="ckeditor" name="noticia"></textarea>
            </td>
        </tr>        
        <tr>
        	<td>
            	Data de Publicação: <input type="text" name="data_publicacao" class="data"   value="<?=date("d/m/Y")?>">
            </td>
        </tr>
        <tr>
        	<td align="center">
            	<input type="submit" value="Cadastrar">
            </td>
        </tr>
    </table>
</form>