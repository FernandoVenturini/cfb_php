<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aula 02 - CFB Cursos - Constantes e Variaveis</title>
</head>

<body>
	<h1>Aula 02 - CFB Cursos - Constantes e Variaveis</h1>

	<?php
	echo "<h1>Criando Variáveis ​​PHP</h1>";
	$x = 5;
	$y = "Jhon";

	$exemplo01 = "Curso de php";
	echo "Estou fazendo " . $exemplo01 . "<br>";

	$concatenando = "Exemplo de concatenacao";
	echo "Esse e um " . $concatenando . "!" . "<br>";

	$x = 5;
	$y = 10;
	echo $x + $y . "<br>";

	$x = 5; // inteiro
	$y = "John"; // string
	echo $x;
	echo $y;

	// var_dump: retorna o tipo de dado e o valor;
	$x = 5;
	var_dump($x);

	// Atribuir string a uma variável:
	$x = "John";
	echo $x;

	// Atribuir vários valores:
	$x = $y = $z = "Frutas";
	echo "x";
	echo "y";
	echo "z";

	// Escopo de variáveis ​​PHP: podem ser declaradas em qualquer lugar do script.
	// O PHP tem três escopos de variáveis ​​diferentes:
	// 	local
	// 	global
	// 	estático		
	$x = 5; // escopo global
	function myTeste()
	{
		// se usarmos a variavel $x aqui dentro da funcao vai gerar um erro.
		echo "<p?>Variavel x dentro da funcao $x</p>";
	}
	myTeste(); // chamando a funcao
	echo "<p>Variavel x fora da funcao e: $x<p>";

	// PHP A palavra-chave global
	// A globalpalavra-chave é usada para acessar uma variável global de dentro de uma função.
	$x = 5;
	$y = 10;
	function myTeste2()
	{
		global $x, $y;
		$y = $x + $y;
		// $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y']; Pode ser reescrito assim tambem.
	}
	myTeste2();
	echo "$y";

	// PHP A palavra-chave estática
	// Normalmente, quando uma função é concluída/executada, todas as suas variáveis ​​são excluídas. No entanto, às vezes queremos que uma variável local NÃO seja excluída. Precisamos dela para uma tarefa futura.
	function myTeste3()
	{
		static $x = 0;
		echo $x;
		$x++;
	}
	myTeste3();
	myTeste3();
	myTeste3();

	// Qual nome sera impresso na tela:
	$name = 'Linus'; // escopo global
	function myTest()
	{
		$name = 'Tobias'; // escopo local
	}
	myTest();
	echo $name;

	?>
</body>

</html>