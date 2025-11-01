<?php
	// Classes Abstratas
	abstract class CarroBase {
		public $potencia;
		public $velMax;
		public $portas;
		public $ligado = false;

		abstract function teste(); // Método abstrato

		// Métodos:
		function ligar() {
			$this->ligado = true;
		}

		function desligar() {
			$this->ligado = false;
		}

		function status() {
			echo "--- Status do Carro ---<hr>";
			echo "Potência: " . $this->potencia . " HP<br>";
			echo "Velocidade Maxima: $this->velMax km/h<br>";
			echo "Número de Portas: $this->portas<br>";
			echo "-----------------------<br>";

			// Verifica se o carro está ligado ou desligado
			if ($this->ligado) {
				echo "O carro está ligado.<br>";
			} else {
				echo "O carro está desligado.<br>";
			}
			echo "<hr>";
		}
	}

	class Carro extends CarroBase {
		// A classe Carro herda todos os atributos e métodos da classe CarroBase
		
		// Construtor da classe Carro:
		function __construct($potencia, $velMax, $portas) {
			$this->potencia = 150;
			$this->velMax = 220;
			$this->portas = 4;
			$this->status();
		}

		function teste() {
			echo "Teste do método abstrato implementado na classe Carro.<br>";
		}
	}

	$carro1 = new Carro(250, 280, 4);

	$carro1->ligar();
	$carro1->status();

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classes - abstract</title>
</head>
<body>
	
</body>
</html>