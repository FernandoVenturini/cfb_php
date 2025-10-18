<?php
	if(isset($_POST["f_nome"])){
		$vnome = $_POST["f_nome"];
		echo "Nome: $vnome<br/>";
	} else {
		echo "Dados nao submetidos";
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aula 17 - CFB Cursos - Funcao Isset</title>
</head>
<body>
	<h1>Aula 17 - CFB Cursos - Funcao Isset</h1>

	<form action="aula17.php" name="f_aula" method="post">
		<label>Nome: </label><br>
		<input type="text" name="f_nome"><br>
		<input type="submit" value="Enviar">
	</form>

	<?php
		$aula = ''; 

		if(isset($aula)) {
			echo "Variavel aula foi definida!<br/>";
		} else {
			echo "Variavel NAO definida!<br/>";
		}		
	?>
</body>
</html>

<?php
	}
?>