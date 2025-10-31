<?php
	// Herança de classes - visibilidade private
	class aula {
		private $var1 = "Bom dia!<br>"; // Atributos private só podem ser acessados dentro da própria classe
		private $var2 = "Bom tarde!<br>";
		protected $var3 = "Bom noite!<br>"; // Atributos protected podem ser acessados dentro da própria classe e por classes filhas

		// Metodo da classe aula:
		function escreve() {
			echo "Metodo da classe aula:<br>";
			echo $this->var1;
			echo $this->var2;
			echo $this->var3;
		}
	}

	// Classe canal herda a classe aula:
	class canal extends aula {
		var $var4 = "Curso de php<br>";
		var $var5 = "Fernando<br>";

		// Metodo da classe canal:
		function escreve2() {
			echo "Metodo da classe canal:<br>";
			echo $this->var4;
			echo $this->var5;
		}
	}

	// Criando os objetos:
	$aula1 = new aula();
	$canal1 = new canal();

	// Chamando os metodos:
	$aula1->escreve(); // Vai funcionar normalmente
	echo "<hr>";
	$canal1->escreve(); // Não vai funcionar, pois o metodo escreve() tenta acessar atributos private da classe pai
	echo "<hr>";
	$canal1->escreve2(); // Vai funcionar normalmente
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classes - Herancas</title>
</head>
<body>
	
</body>
</html>