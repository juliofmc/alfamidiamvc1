<table width="100%" border="1">
	<tr>
    	<th>
        		Foto
        </th>    
    	<th>
        		Nome
        </th>   
    	<th>
        		Ação
        </th>        
    </tr>
    <?php
    	
		$query = "SELECT *FROM galerias ORDER BY nome";
		$resultado = $conexao->query($query);
		
		while($dados = $resultado->fetch_assoc()){
			

	?>
        <tr>
            <td width="100">
            	<?
                	if(file_exists('conteudos/galerias/'.$dados['foto_capa']) && !empty($dados['foto_capa'])){
						?>
		                   <img src="conteudos/galerias/<?=$dados['foto_capa']?>" width="100px">                        
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
            <td width="70px">
                   <a href="painel.php?m=galerias&a=editaGaleria&id=<?php echo $dados['id']?>"><img src="img/editar.png"></a>
                  <!--a href="painel.php?m=usuarios&a=excluirUsuario&id=<?php echo $dados['id']?>"><img src="img/excluir.png"></a-->
                  <img src="img/excluir.png" onClick="confirmacao('painel.php?m=galerias&a=excluiGaleria&id=<?php echo $dados['id']?>&foto=<?=$dados['foto_capa']?>')" style="cursor:pointer">
                  <a href="painel.php?m=galerias&a=fotos&id=<?php echo $dados['id']?>"><img src="img/galeria.png"  style="cursor:pointer"></a>
                 
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