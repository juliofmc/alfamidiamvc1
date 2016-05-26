<?
		//include('../../classes/noticia.class.php');
		$obj = new noticia();
		$array = $obj->Listar();
?>

<table width="100%" border="1">
	<tr>
    	<th>
        		Titulo
        </th>
    	
    	<th>
        		Ação
        </th>        
    </tr>
    <?php
		foreach($array as $dados){
			?>

        <tr>
            <td>
                    <?=$dados['titulo']?>
            </td>
  
            <td width="70px">
                   <a href="painel.php?m=noticias&a=editaNoticia&id=<?php echo $dados['id']?>"><img src="img/editar.png"></a>
    
                  <img src="img/excluir.png" onClick="confirmacao('painel.php?m=noticias&a=excluirNoticia&id=<?php echo $dados['id']?>')" style="cursor:pointer">
                 
            </td>        
        </tr>            
            <?
		}
    	
		$query = "SELECT *FROM noticias ORDER BY titulo";
		$resultado = mysql_query($query);
		
		while($dados = mysql_fetch_array($resultado)){
	?>
        <tr>
            <td>
                    <?=$dados['titulo']?>
            </td>
  
            <td width="70px">
                   <a href="painel.php?m=noticias&a=editaNoticia&id=<?php echo $dados['id']?>"><img src="img/editar.png"></a>
    
                  <img src="img/excluir.png" onClick="confirmacao('painel.php?m=noticias&a=excluirNoticia&id=<?php echo $dados['id']?>')" style="cursor:pointer">
                 
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