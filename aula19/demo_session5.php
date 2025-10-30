<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>demo_session5</title>
</head>
<body>
	<h2>Destruir uma sessão PHP</h2>
	<p>Para destruir uma sessão, use a função session_destroy().</p>
	<?php
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();

		echo "Sessão destruída.";
	?>
</body>
</html>