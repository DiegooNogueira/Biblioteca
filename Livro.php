<?php

	class Livro{
		private $titulo;
		private $categoria;
		private $quantidade;
		private $con;

		public function __construct(){

		}

		public function conectar(){
			$this->con=mysqli_connect("localhost","root","","biblioteca"); 
			if(!$this->con){
				//caso ocorra um erro, exiba uma mensagem com o erro
				die("Problemas com a conexão");

			}
		}
		public function desconectar(){
			$this->con->close();
		}
		public function verificar($titulo, $categoria, $quantidade){
			if (!empty($titulo) && !empty($categoria) && is_numeric($quantidade)) {

				return true;
			}
			else
				return false;
		}

		public function cadastrar($titulo, $categoria,$quantidade){
			$resp=$this->verificar($titulo, $categoria, $quantidade);
			if ($resp==true) {
				$this->conectar();
					$stm=$this->con->prepare("insert into livro values(null, ?, ?, ?)");

					$stm->bind_param("ssi", $titulo, $categoria, $quantidade);

					$resp = $stm->execute();
					$stm->close();
					$this->desconectar();
			}
			return $resp;
		}

		public function exibeDados(){
			$retorno = "<h2>Não há livros cadastrados!</h2>";
			$this->conectar();

			$sql = "select * from livro";
			$dados = $this->con->query($sql);

			if ($dados->num_rows > 0) {
				$tabela = '<table class="table">
								<tr>
									<thead class="thead-dark">
									<th scope="col">Título</th>
									<th scope="col">Categoria</th>
									<th scope="col">Quantidade</th>
									</thead>
								</tr>';
				while ($livro = $dados->fetch_object()) 
				{
					
					$tabela .="<tr>
									<td>$livro->titulo</td>
									<td>$livro->categoria</td>
									<td>$livro->quantidade</td>
								</tr>";
				}
				$tabela .="</table>";
				$dados->close();
				$retorno = $tabela;
			}

			$this->desconectar();
			return $retorno;
		}

		public function consulta($consulta){
			$this->conectar();

			$sql = "select * from livro where titulo like '%$consulta%' order by titulo;";
			$dados = $this->con->query($sql);

				if ($dados->num_rows > 0) {
				$tabela = '<table class="table">
								<tr>
									<thead class="thead-dark">
									<th scope="col">Codigo</th>
									<th scope="col">Titulo</th>
									<th scope="col">Categria</th>
									<th scope="col">Quantidade</th>
									<th>Alterar</th>
									<th>Excluir</th>
									</thead>
								</tr>';
				while ($livro = $dados->fetch_object()) 
				{
					
					$tabela .="<tr>
									<td>$livro->idLivro</td>
									<td>$livro->titulo</td>
									<td>$livro->categoria</td>
									<td>$livro->quantidade</td>
									<td><a href='alterar.php?idLivro=$livro->idLivro'>Alterar</a></td>
									<td><a href='excluir.php?idLivro=$livro->idLivro'>Excluir</a></td>
								</tr>";
				}
				$tabela .="</table>";
				$dados->close();
				$retorno = $tabela;
			}else{
				$retorno = "Não há Livros com esse nome";
			}
			$this->desconectar();
			return $retorno;


		}
		function recuperaDados($codigo){
			$this->conectar();

			$resp=$this->con->query("select * from livro where idLivro = $codigo");

			$dados = mysqli_fetch_assoc($resp);

			return $dados;
		}
		public function alterar($codigo, $titulo, $categoria, $quantidade){
			$this->conectar();

			$stm=$this->con->prepare("update livro set titulo = ?, categoria=?, quantidade=? where idLivro = $codigo");

			$stm->bind_param("ssi", $titulo, $categoria, $quantidade);
			$resp = $stm->execute(); 
			$stm->close();
			$this->desconectar();

			return $resp;
		}

		public function excluir($codigo, $titulo, $categoria, $quantidade){
			$this->conectar();

			$stm=$this->con->prepare("delete from livro where idLivro = $codigo");

			$stm->bind_param("ssi", $titulo, $categoria, $quantidade);
			$resp = $stm->execute(); 
			$stm->close();
			$this->desconectar();

			return $resp;
		}

	}

?>