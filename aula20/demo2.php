<?php
	// Definição da classe Carro:
	class Carro {
		public $tipo; // 1- Passeio / 2- Esporte / 3- Utilitário
		public $velMax;
		public $nome;
		public $liga;
		public $vel;

		// Método construtor correto (PHP 5+):
		function __construct($tipo, $nome) { // Construtor moderno
			$this->tipo = $tipo; // Tipo do carro
			$this->liga = false; // Carro desligado
			$this->nome = $nome; // Nome do carro
			$this->vel = 0; // Velocidade inicial

			// Definindo o tipo e a velocidade máxima:
			if ($tipo == 1) {
				$this->velMax = 160;
			} else if ($tipo == 2) {
				$this->velMax = 300;
			} else {
				$this->velMax = 100;
			}
		}

		// Método para ligar o carro:
		function ligar() {
			$this->liga = true;
		}

		// Método para desligar o carro:
		function desligar() {
			$this->liga = false;
		}

		// Método para velocidade o carro:
		function velocidade($valor) {
			if ($valor > $this->velMax) {
				$this->vel = $this->velMax;
			} else {
				$this->vel = $valor;
			}
		}

		// Método para retornar o id do carro:
		function id() {
			echo "<br/>";
			echo "Nome do carro: " . $this->nome . "<br/>";
			echo "Tipo do carro: " . $this->tipo . "<br/>";
			echo "Velocidade maxima: " . $this->velMax . "<br/>";
			echo "Velocidade atual: " . $this->vel . "<br/>";

			// Verificando se o carro esta ligado ou desligado:
			if ($this->liga) {
				echo "O carro esta ligado! <br/>";
			} else {
				echo "O carro esta desligado! <br/>";
			}
		}
	}

	// Criando um objeto da classe Carro:
	$carro1 = new Carro(1, "USV");
	$carro2 = new Carro(2, "Lamborghini");
	$carro3 = new Carro(3, "BMW");
	
	// Ligando o carro ANTES de mostrar as informações:
	$carro1->ligar();
	$carro2->desligar();
	$carro3->ligar();
	
	// Definindo uma velocidade:
	$carro1->velocidade(150);
	$carro2->velocidade(0);
	$carro3->velocidade(250);
	
	// Agora sim chamando o método id():
	$carro1->id();
	$carro2->id();
	$carro3->id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classes - demo2</title>
</head>
<body>
	
</body>
</html>