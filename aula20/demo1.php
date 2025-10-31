<?php
	// Definig a class: Syntax
	// Declarando uma classe chamada Fruit, composta por duas propriedades ($name e $color):		 
	class Fruit { 
		public $name;
		public $color;
		
		// Metodos: 
			// A seguir, declaramos dois métodos (funções) dentro da classe: 
				// set_name()
				// get_name() para definir e obter a propriedade $name:
		function set_name($name) {
			$this->name = $name;
		}
		function get_name() {
			return $this->name;
		}

		// set_color() e get_color() para definir e obter a propriedade $color:
		function set_color($color) {
			$this->color = $color;
		}
		function get_color() {
			return $this->color;
		}
	}

	// Definindo objetos:
	$apple = new Fruit();
	$banana = new Fruit();
	$apple->set_name('Apple');
	$apple->set_color('Red');
	$banana->set_name('Banana');

	// Acessando propriedades e métodos dos objetos:
	echo $apple->get_name();
	echo "<br>";
	echo $banana->get_name();
	echo "<br>";
	echo "Name: " . $apple->get_name();
	echo "<br>";
	echo "Color: " . $apple->get_color();

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classes</title>
</head>
<body>
	<h1>Classes</h1>

	<?php

	?>
</body>
</html>