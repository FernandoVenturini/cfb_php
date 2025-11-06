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

		function liga() {
			$this->ligado = true;
		}

		function desliga() {
			$this->ligado = false;
		}

		function status() {
			echo "<br>";
			echo "Potencia: " . $this->potencia . " cv";
			echo "<br>Velocidade Maxima: " . $this->velMax . " km/h";
			echo "<br>";
			
			if ($this->ligado) {
				return "O carro está ligado.";
			} else {
				return "O carro está desligado.";
			}
			echo "<br>";
		}

		function acelera() {}
		function freia() {}
		function atiraCanhao() {}
		function atiraMetralhadora() {}

	}

	// Classe concreta que estende a classe abstrata CarroBase:
	class Carro extends CarroBase { 
		function __construct($pt, $vm) {
			$this->potencia = $pt;
			$this->velMax = $vm;

			$this->liga();
		}

		// Implementação do método teste
		public function teste() {
			// Você pode adicionar lógica aqui conforme necessário
			return "Método teste implementado.";
		}
	}

	// Instanciando a classe Carro:
	$carro1 = new Carro(150, 280);
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

	<?php
    // Exibe o status do carro
    echo $carro1->status();
    ?>
</body>
</html>