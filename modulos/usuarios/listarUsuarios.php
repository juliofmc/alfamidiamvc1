<table width="100%" border="1">
	<tr>
    	<th>
        		Foto
        </th>    
    	<th>
        		Nome
        </th>
    	<th>
        		Usuario
        </th>        
    	<th>
        		Ação
        </th>        
    </tr>
    <?php
    	
		$query = "SELECT *FROM usuarios ORDER BY nome";
		$resultado = mysql_query($query);
		
		while($dados = mysql_fetch_array($resultado)){
			

	?>
        <tr>
            <td width="100">
            	<?
                	if(file_exists('conteudos/fotos/'.$dados['arquivo']) && !empty($dados['arquivo'])){
						?>
		                   <img src="conteudos/fotos/<?=$dados['arquivo']?>" width="100px">                        
                        <?
					}else{
						?>
                        	<img src="img/semfoto.jpg" width="100">
                        <?
					}
				?>

            </td>        
            <td>
                    <?=$dados['nome']?>
            </td>
            <td>
                    <?php echo $dados['usuario']?>
            </td>        
            <td width="70px">
                   <a href="painel.php?m=usuarios&a=editaUsuario&id=<?php echo $dados['id']?>"><img src="img/editar.png"></a>
                  <!--a href="painel.php?m=usuarios&a=excluirUsuario&id=<?php echo $dados['id']?>"><img src="img/excluir.png"></a-->
                  <img src="img/excluir.png" onClick="confirmacao('painel.php?m=usuarios&a=excluirUsuario&id=<?php echo $dados['id']?>&foto=<?=$dados['arquivo']?>')" style="cursor:pointer">
                 
            </td>        
        </tr>    
  <?php
		}
  ?>  
</table>
 <script>
			function confirmacao(url){
				
					if(confirm('Deseja realmente excluir este registro')){
						document.location.href = url;
					}
								
			}
  </script>