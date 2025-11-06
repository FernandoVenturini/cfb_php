<?php
		echo "<h1>Hello, Celke!</h1>";

		$idade = 45;
		$nome = "Cesar Szpak";
		echo "<p>O nome e $nome e a idade e $idade anos.</p>";

		$qtd_prod = 61;
		$qtd_prod = $qtd_prod - 7;
		echo "Quantidade de produtos em estoque: $qtd_prod";

		$saldo = 5.87;
		$deposito = 2570.52;
		$saldo = $saldo + $deposito;
		echo "<p>Saldo atual e " . number_format($saldo, 2, ", ", ".") . " </p>";

		$situacao = true;
		if ($situacao) {
			echo "<span style='color:green'>APROVADO!<span>";
		} else {
			echo "<span style='color:red'>REPROVADO!<span>";
		}
	?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Celke - aula 3 - Introducao</title>
</head>
<body>
	
</body>
</html>