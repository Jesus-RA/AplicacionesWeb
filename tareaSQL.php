<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
</head>
<body>
	<h2>Clientes</h2>
	<hr>
	<?php
		$link= mysqli_connect("localhost","root","");
		mysqli_select_db($link, "videoteca");
		$result= mysqli_query($link, "select * from clientes");		
		echo "<select name='cliente' form='movies'>";
		while($row=mysqli_fetch_array($result)){
			$cliente= $row['cliente'];
			$id= $row['id_cliente'];
			//echo "<select>
					echo "<option value='$id'> $cliente";
			//	</select>";
			//echo "$cliente <br>";
		}
		echo "</select>";		
		mysqli_close($link);

	?>
	<br><br>
	<form action="movies.php" id="movies">
		<input type="submit" name="enviar" value="Enviar" form="movies">
	</form>
</body>
</html>