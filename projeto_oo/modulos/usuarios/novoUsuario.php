<form action="painel.php?m=usuarios&a=realizaCadastro" method="post" enctype="multipart/form-data">
	<table>
    	<tr>
        	<td>
            	<input type="text" name="nome" placeholder="Nome:" >
            </td>
        </tr>
        <tr>
        	<td>
            	Foto: <input type="file" name="foto" placeholder="Foto">
            </td>
        </tr>
    	<tr>
        	<td>
            	<input type="text" name="usuario" placeholder="Usuário:" >
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
            	<input type="submit" value="Cadastrar">
            </td>
        </tr>                   
    </table>
</form>