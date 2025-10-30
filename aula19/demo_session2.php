<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>demo_session2</title>
</head>
<body>
	<h1>demo_session2</h1>

	<?php
		// Echo session variables that were set on previous page
		echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
		echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
	?>
</body>
</html>