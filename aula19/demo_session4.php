<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>demo_session4</title>
</head>
<body>
	<h2>Modificar uma variável de sessão PHP</h2>
	<p>Para alterar uma variável de sessão, basta sobrescrevê-la</p>
	<?php
		$_SESSION["favcolor"] = "yellow";
		print_r($_SESSION);
	?>
</body>
</html>