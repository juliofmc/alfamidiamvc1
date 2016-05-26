<?
	class galeria{
		
		/***************************************************************************
				PROPRIEDADES
		***************************************************************************/

		private $id;
		private $nome;
		private $foto_capa;
		private $arquivoAntigo;
		private $caminho;		
		private $conexao;
		
		//Construtor
		public function __construct(){
			$this->conexao = $GLOBALS['conexao'];
		}
		
		/***************************************************************************
				SETS
		***************************************************************************/		
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}		
		
		
		public function setArquivo($arquivo){
			$this->foto_capa = $arquivo;
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
			$query = " INSERT INTO galerias (nome)  VALUES ('$this->nome') "; 
			//Se der erro retorna false para o objeto que está chamando o método
			if(!$this->conexao->query($query)){
				return false;
			}else{ 

				//Caso conseguimos inserir o usuário no banco dedados, verificamos se é para mover algum arquivo
				if(!empty($this->foto_capa['name'])){
					//Movemos a imagem para o servidor
					$ext = strtolower(strrchr($this->foto_capa['name'],'.'));
					$nomeArquivo = time().$ext;
				
					if(move_uploaded_file($this->foto_capa['tmp_name'],$this->caminho.$nomeArquivo)){
						$id = $this->conexao->insert_id;
						$query = "UPDATE galerias SET foto_capa='$nomeArquivo' WHERE id='$id' ";
						
						if($this->conexao->query($query)){
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
			//Atualizaa  galeria no banco de dados
			$query = " UPDATE galerias SET nome='$this->nome' WHERE id='$this->id' "; 	
			

			//Se der erro retorna false para o objeto que está chamando o método
			if(!$this->conexao->query($query)){
				return false;
			}else{ 
				//Caso conseguimos inserir o usuário no banco dedados, verificamos se é para mover algum arquivo
				if(!empty($this->foto_capa['name'])){
					//Movemos a imagem para o servidor
					$ext = strtolower(strrchr($this->foto_capa['name'],'.'));
					$nomeArquivo = time().$ext;
					
					if(move_uploaded_file($this->foto_capa['tmp_name'],$this->caminho.$nomeArquivo)){
						@unlink($this->caminho.$this->arquivoAntigo);
						$id = $this->id;
						$query = "UPDATE galerias SET foto_capa='$nomeArquivo' WHERE id='$id' ";
						if($this->conexao->query($query)){
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