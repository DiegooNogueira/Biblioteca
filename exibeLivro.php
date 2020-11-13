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
		include "menu.php";
		include "Livro.php";

		$livro = new Livro();
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<hr>
				<?php
					if(isset($_GET["msg"])){
						echo "<h3><i>".$_GET["msg"]."</i></h3>";
					}
				?>
				<h1>Livros Cadastrados</h1>
				<?php
					echo $livro->exibeDados();
				?>
			</div>
		</div>
	</div>
	</body>
</html>