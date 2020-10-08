<?php
	$link = mysqli_connect("localhost", "admin", "admin", "test");
	if(mysqli_connect_error($link)){
		echo "MariaDB connection Failed!!", "<br>";
		echo "error: ", mysqli_connect_error();
	} else {
		echo "MariaDB connection Success!!", "<br>";
	}

	$query = "SELECT * FROM music;";
	$result = mysqli_query($link, $query);
	$table = '';

	while($row = mysqli_fetch_array($result)){
		$table .= '<tr><td>'.$row['title'].'</td><td>'.$row['singer'].'</td></tr>';
	}
	
	
	mysqli_close($link);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TEST</title>
	</head>
	<body>
		<br>
		<table border="1">
			<?= $table ?>
		</table>
	
	</body>
</html>
