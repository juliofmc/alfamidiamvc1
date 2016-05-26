<?
	class noticia{
		/**********************************************************************
			PROPRIEDADES
		***********************************************************************/
		private $id;
		private $titulo;
		private $noticia;
		private $data_publicacao;
		
		/**********************************************************************
			SETS
		***********************************************************************/		
		public function setId($id){
			$this->id = $id;
		}
		
		public function setTitulo($titulo){
			$this->titulo = $titulo;
		}	
		
		public function setNoticia($noticia){
			$this->noticia = $noticia;
		}		
		
		public function setDataPublicacao($data_publicacao){
			$this->data_publicacao = $data_publicacao;
		}						
		
		/**********************************************************************
			GETS
		***********************************************************************/		
		public function getId(){
			return $this->id;
		}
		
		public function getTitulo(){
			return $this->titulo;
		}	
		
		public function getNoticia(){
			return $this->noticia;
		}		
		
		public function getDataPublicacao(){
			return $this->data_publicacao;
		}			
		
		/**********************************************************************
			MÉTODOS
		***********************************************************************/				
		public function Cadastrar(){
				$query = "
								INSERT INTO 
														noticias 
																	(
																		 titulo,
																		 noticia,
																		 data_publicacao
																	 )  
													VALUES 
																	(
																		'$this->titulo',
																		'$this->noticia',
																		'$this->data_publicacao'
																	) 			
							   ";
				
				if(mysql_query($query)){
					
					return true;
					
				}else{
					
					return false;
					
				}
		}
		
		//Método Atualizar
		public function Atualizar(){
				$query = "
								UPDATE  noticias
														SET 
																 titulo = '$this->titulo',
																 noticia = '$this->noticia',
																 data_publicacao = '$this->data_publicacao'
													WHERE 
																	id='$this->id'
																	
							   ";
				
				if(mysql_query($query)){
					
					return true;
					
				}else{
					
					return false;
					
				}
		}		
		
		//Método Excluir
		public function Excluir(){
				$query = " DELETE FROM  noticias  WHERE  id='$this->id' ";
				
				if(mysql_query($query)){
					
					return true;
					
				}else{
					
					return false;
					
				}
		}		
		
		//Método Listar
		public function Listar(){
			//Selecionamos todas as noticias
			$query = (!empty($this->id)) ? "SELECT *, DATE_FORMAT(data_publicacao,'%d/%m/%Y') as dt FROM noticias WHERE id='$this->id' ORDER BY titulo" :  "SELECT *, DATE_FORMAT(data_publicacao,'%d/%m/%Y') as dt FROM noticias ORDER BY titulo";
			
			
			
			
			$query = mysql_query($query);
			
			//Percorremos todas as noticias encontradas
			$x = 0;
			$array = NULL;
			while($dados = mysql_fetch_array($query)){// Varremos o banco de dados
				
				foreach($dados as $indice => $valor){ //Percorremos a variavel dados
					$array[$x][$indice] = $valor;
				}
				
				$x++;
			}
			
			return $array;
			
		}
	}
?>