<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit-no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Formulário</title>
</head>
<body>
	<?php 
		include_once('menu.php');
		include_once('Livro.php');

		$livro = new Livro();
		$codigo = $_GET['idLivro'];

		$dados = $livro->recuperaDados($codigo);
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12s">
				<hr>
				<h1>Realize as Alterações</h1>
				<form action="sistema.php" method="post">
					<input type="hidden" name="tipo" value="alterar">
					<div class="form-group">
						<label>Codigo do Livro</label>
						<input type="text" value="<?php echo $codigo; ?>" class="form-control" name="codigo" readonly>
					</div>

					<div class="form-group">
						<label>Titulo</label>
						<input type="text" value="<?php echo $dados['titulo']; ?>" class="form-control" name="titulo">
					</div>

					<div class="form-group">
						<label>Categoria</label>
						<input type="text" value="<?php echo $dados['categoria']; ?>" class="form-control" name="categoria">
					</div>

					<div class="form-group">
						<label>Quantidade de Cópias</label>
						<input type="text" value="<?php echo $dados['quantidade']; ?>" class="form-control" name="quantidade">
					</div>
					<input type="submit" class="btn btn-primary" value="Alterar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>