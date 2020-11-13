<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--Botstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Formulário</title>
</head>
<body>

	<?php

		include_once('menu.php');

	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<hr>
				<h1>Cadastro de livros</h1>
				<form action="sistema.php" method="post">
					<input type="hidden" name="tipo" value="livro">
					<div class="form-group">
						<label>
							Título
						</label>
						<input type="text" class="form-control" name="titulo" placeholder="Digite o título do livro">
						
					</div>
					<div class="form-group">
						<label>
							Categoria
						</label>
						<input type="text" class="form-control" name="categoria" placeholder="Digite a categoria do livro">
					</div>
					<div class="form-group">
						<label>
							Quantidade de cópias:
						</label>
						<input type="number" class="form-control" name="quantidade">
					</div>
					<input type="submit" class="btn btn-primary" value="Cadastrar">
				</form>
			</div>
		</div>
	</div>

</body>
</html>