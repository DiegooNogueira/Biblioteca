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
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<hr>
				<h1>Consulte os Livros Cadastrados</h1>
				<form action="sistema.php" method="post">
					<input type="hidden" name="tipo" value="consulta">
					<div class="form-group">
						<label>Títulos</label>
						<input type="text" class="form-control" name="titulo" placeholder="Digite o Título do Livro">
					</div>
					<input type="submit" class="btn btn-primary" value="Consultar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>