<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aula 18 - CFB Cursos - Passagem de valores pela url</title>
</head>
<body>
	<h1>Aula 18 - CFB Cursos - Passagem de valores pela url</h1>


	<?php
		$vtexto = "Curso de PHP do CFB Cursos";

		echo "<a href=pg1.php?tx=".urlencode($texto)." target=_self>Abre pg1</a>";
	?>
</body>
</html>