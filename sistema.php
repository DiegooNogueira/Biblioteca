<?php

include "Livro.php";
$tipo = $_POST['tipo'];
$livro = new Livro();

switch ($tipo) {
	case 'livro':
		$titulo = $_POST['titulo'];
		$categoria = $_POST['categoria'];
		$quantidade = $_POST['quantidade'];

		$msg = $livro->cadastrar($titulo, $categoria, $quantidade)?"Cadastro realizado com sucesso!":"Erro ao cadastrar";

		header("location: exibeLivro.php?msg=".urlencode($msg));
		break;
	case 'consulta':
		include "consulta.php";
		$consulta = $_POST['titulo'];
		echo '<div style="margin-left: 150px;
		margin-right: 150px; margin-top:20px;">'.$livro->consulta($consulta). '</div>';
		break;

	case 'alterar':
		$codigo = $_POST['codigo'];
		$titulo = $_POST['titulo'];
		$categoria = $_POST['categoria'];
		$quantidade = $_POST['quantidade'];

		$msg = $livro->alterar($codigo, $titulo, $categoria, $quantidade)?"Cadastro realizado com sucesso!":"Erro ao alterar";

		header("location: exibeLivro.php?msg=".urlencode($msg));

		break;

	case 'excluir':
		$codigo = $_POST['codigo'];
		$titulo = $_POST['titulo'];
		$categoria = $_POST['categoria'];
		$quantidade = $_POST['quantidade'];

		$msg = $livro->excluir($codigo, $titulo, $categoria, $quantidade)?"<br>Exclusão realizada com sucesso!<br>":"<br>Erro ao excluir<br>";

		header("location: exibeLivro.php?msg=".urlencode($msg));

		break;
}	

?>