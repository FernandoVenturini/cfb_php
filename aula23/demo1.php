<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Celke - aula 4 - Operadores Aritmeticos e Operadores de Atribuicao no PHP</title>
</head>
<body>
	<h1 
		style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
			Operadores Aritmeticos no PHP
	</h1>

	<?php
	$a = 2;
	$b = 4;
	$c = 7;

	$result_soma = $a + $b;
	echo "<p>A soma de $a + $b = $result_soma</p>";

	$result_subtracao = $a - $b;
	echo "<p>A subtração de $a - $b = $result_subtracao</p>";

	$result_multi = $a - $b;
	echo "<p>A multiplicacao de $a - $b = $result_multi</p>";

	$result_divisao = $c / $b;
	echo "<p>A divisao de $c / $b = $result_divisao</p>";

	$result_resto = $c % $b;
	echo "<p>O resto da divisao de $c % $b = $result_resto</p>";
?>

<h1 
		style="text-align:center;background:purple;padding:3rem;border-radius:10px;font-size:32px;margin:0 auto;">
			Operadores de Atribuicao no PHP
	</h1>


	<?php
		$a = 1;
		$b = 2;
		$c = 3;
		$result = 6;
		echo "<p>O valor de A é: $a</p>";
		echo "<p>O valor de B é: $b</p>";
		echo "<p>O valor de C é: $c</p>";
		echo "<p>O valor de result é: $result</p>";


		// OPERADOR DE ATRIBUIÇÃO SIMPLES
		echo "Somar o valor $result pelo valor $a <br>";
		$result += $a; // $result = $result + $a
		echo "Resultado da soma: $result <br><br>";

		// OPERADOR DE ATRIBUIÇÃO SUBTRAÇÃO		
		echo "Subtrair o valor $result pelo valor $b <br>";
		$result -= $b; // $result = $result - $b
		echo "Resultado da subtracao: $result <br><br>";

		// OPERADOR DE ATRIBUIÇÃO MULTIPLICAÇÃO
		echo "Multiplicar o valor $result pelo valor $c <br>";
		$result *= $c; // $result = $result * $c
		echo "Resultado da multiplicacao: $result <br><br>";

		// OPERADOR DE ATRIBUIÇÃO DIVISÃO
		echo "Dividir o valor $result pelo valor $a <br>";
		$result /= $a; // $result = $result / $a
		echo "Resultado da divisao: $result <br><br>";

		// OPERADOR DE ATRIBUIÇÃO RESTO (MÓDULO)
		echo "Pegar o resto da divisão de $result pelo valor $b <br>";	
		$result %= $b; // $result = $result % $b
		echo "Resultado do resto: $result <br><br>";

		// OPERADOR DE ATRIBUIÇÃO CONCATENAÇÃO
		$texto = "Celke";
		echo "Concatenar o texto '$texto' com ' Treinamentos' <br>";
		$texto .= " Treinamentos"; // $texto = $texto . " Treinamentos"
		echo "Resultado da concatenação: $texto <br><br>";
	?>
</body>
</html>