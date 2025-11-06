<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Celke - aula 5 - Operadores Comparacao e Operadores Logicos no PHP</title>
</head>

<body>
	<h1
		style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
		Operadores Comparacao no PHP
	</h1>

	<?php
		// Operadores de Comparação
		$a = 10;
		$b = 20;
		var_dump($a == $b); // Igualdade
		if ($a == $b) {
			echo "A é igual a B<br/>";
		} else {
			echo "A não é igual a B<br/>";
		}
		
		var_dump($a === $b); // Identico
		if ($a === $b) {
			echo "A e identico a B";
		} else {
			echo "A não é identico a B<br/>";
		}

		var_dump($a != $b); // Diferente
		if ($a != $b) {
			echo "A e diferente de B<br/>";
		} else {
			echo "A não é diferente de B<br/>";
		}

		var_dump($a !== $b); // Não identico
		if ($a !== $b) {
			echo "A e não identico a B<br/>";
		} else {
			echo "A é identico a B<br/>";
		}

		var_dump($a < $b); // Menor que
		if ($a < $b) {
			echo "A e menor que B<br/>";
		} else {
			echo "A não é menor que B<br/>";
		}

		var_dump($a > $b); // Maior que
		if ($a > $b) {
			echo "A e maior que B<br/>";
		} else {
			echo "A não é maior que B<br/>";
		}

		var_dump($a <= $b); // Menor ou igual a
		if ($a <= $b) {
			echo "A e menor ou igual a B<br/>";
		} else {
			echo "A não é menor ou igual a B<br/>";
		}

		var_dump($a >= $b); // Maior ou igual a
		if ($a >= $b) {
			echo "A e maior ou igual a B<br/>";
		} else {
			echo "A não é maior ou igual a B";
		}
	?>

	<h1
		style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
		Operadores de Logicos no PHP
	</h1>


	<?php
		// Operadores Lógicos
		$x = true;
		$y = false;

		var_dump($x && $y); // E(AND)
		if ($x && $y) {
			echo "X e Y são verdadeiros<br/>";
		} else {
			echo "X e Y não são verdadeiros<br/>";
		}

		var_dump($x OR $y); // Ou(OR)
		if ($x OR $y) {
			echo "X ou Y são verdadeiros<br/>";
		} else {
			echo "X ou Y não são verdadeiros<br/>";
		}

		var_dump($x XOR $y); // Ou(XOR)
		if ($x XOR $y) {
			echo "X ou Y são verdadeiros<br/>";
		} else {
			echo "X ou Y não são verdadeiros<br/>";
		}

		var_dump(!$x); // Negação
		if (!$x) {
			echo "X é falso<br/>";
		} else {
			echo "X é verdadeiro<br/>";
		}
	?>
</body>

</html>