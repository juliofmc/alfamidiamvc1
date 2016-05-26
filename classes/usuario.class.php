<?
	class usuario{
		
		/***************************************************************************
				PROPRIEDADES
		***************************************************************************/

		private $id;
		private $usuario;
		private $senha;
		private $nome;
		private $arquivo;
		private $arquivoAntigo;
		/*private $arquivo_original;*/
		private $caminho;		
		
		/***************************************************************************
				SETS
		***************************************************************************/		
		public function setId($id){
			$this->id = $id;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}		
		
		public function setSenha($senha){
			$this->senha = $senha;
		}				
		
		public function setNome($nome){
			$this->nome = $nome;
		}						
		
		public function setArquivo($arquivo){
			$this->arquivo = $arquivo;
		}								
		
		public function setArquivoAntigo($arquivoAntigo){
			$this->arquivoAntigo = $arquivoAntigo;
		}										
		
		/*public function setArquivoOriginal($arquivo_original){
			$this->arquivo_original = $arquivo_original;
		}	*/
		
		public function setCaminho($caminho){
			$this->caminho = $caminho;
		}
		
		
		/***************************************************************************
				GETS
		***************************************************************************/												
		public function getId(){
			return $this->id;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}		
		
		public function getSenha(){
			return $this->senha;
		}				
		
		public function getNome(){
			return $this->nome;
		}						
		
		public function getArquivo(){
			return $this->arquivo;
		}								
		
	/*	public function getArquivoOriginal(){
			return $this->arquivo_original;
		}					
		*/
		/***************************************************************************
				METODOS
		***************************************************************************/	
		
		public function Listar(){
			
		}
		
		public function Cadastrar(){
			//Cadastramos o usuário no banco de dados
			$query = " INSERT INTO usuarios (usuario,senha,nome)  VALUES ('$this->usuario','$this->senha','$this->nome') "; 
			//Se der erro retorna false para o objeto que está chamando o método
			if(!mysql_query($query)){
				return false;
			}else{ 
				//Caso conseguimos inserir o usuário no banco dedados, verificamos se é para mover algum arquivo
				if(!empty($this->arquivo['name'])){
					//Movemos a imagem para o servidor
					$ext = strtolower(strrchr($this->arquivo['name'],'.'));
					$nomeArquivo = time().$ext;
					
					if(move_uploaded_file($this->arquivo['tmp_name'],$this->caminho.$nomeArquivo)){
						$id = mysql_insert_id();
						$query = "UPDATE usuarios SET arquivo='$nomeArquivo', arquivo_original='{$this->arquivo['name']}' WHERE id='$id' ";
						
						if(mysql_query($query)){
							return true;
						}else{
							return false;
						}
					}
				
				}else{ // Se não formos mover nenhum arquivo, retornamos tru para o objeto que chamou o método e encerramos o código
					return true;
				}
			}
		}
		
		//Metodo Atualizar
		public function Atualizar(){
			//Atualizar o usuário no banco de dados
			if(!empty($this->senha)){
				$query = " UPDATE usuarios SET usuario='$this->usuario', senha='$this->senha' ,nome='$this->nome' WHERE id='$this->id' "; 				
			}else{
				$query = " UPDATE usuarios SET usuario='$this->usuario',nome='$this->nome' WHERE id='$this->id' "; 				
			}
			

			//Se der erro retorna false para o objeto que está chamando o método
			if(!mysql_query($query)){
				return false;
			}else{ 
				//Caso conseguimos inserir o usuário no banco dedados, verificamos se é para mover algum arquivo
				if(!empty($this->arquivo['name'])){
					//Movemos a imagem para o servidor
					$ext = strtolower(strrchr($this->arquivo['name'],'.'));
					$nomeArquivo = time().$ext;
					
					if(move_uploaded_file($this->arquivo['tmp_name'],$this->caminho.$nomeArquivo)){
						@unlink($this->caminho.$this->arquivoAntigo);
						$id = $this->id;
						$query = "UPDATE usuarios SET arquivo='$nomeArquivo', arquivo_original='{$this->arquivo['name']}' WHERE id='$id' ";
						
						if(mysql_query($query)){
							return true;
						}else{
							return false;
						}
					}
				
				}else{ // Se não formos mover nenhum arquivo, retornamos tru para o objeto que chamou o método e encerramos o código
					return true;
				}
			}
		}		
	}


?>