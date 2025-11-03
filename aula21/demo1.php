<?php
	// Interfaces são similares as classes abstratas, porém todas as funções
	// Interface para carros padrão:
	interface CarroPadrao { 
		public function liga();
		public function desliga();
		public function status();
		public function acelera();
		public function freia();
	}

	// Uma classe pode implementar várias interfaces
	// Interface para carros de guerra:
	interface CarroGuerra { 
		public function atiraCanhao();
		public function atiraMetralhadora();
	}

	// Classe abstrata que implementa a interface CarroPadrao:
	abstract class CarroBase implements CarroPadrao { 
		public $potencia;
		public $velMax;
		public $ligado = false;

	}

	// Classe concreta que estende a classe abstrata CarroBase:
	class Carro extends CarroBase { 

	}

	// Instanciando a classe Carro:
	$carro = new Carro();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classes - Interface</title>
</head>
<body>
	<h1>Classes - Interface</h1>
</body>
</html>