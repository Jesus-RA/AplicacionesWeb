<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<h3>Datos con formulario</h3>
	<hr>
	<form action="select2.php" metho="POST">
		Ingresa tu nombre: <input type="text" name="nombre"> <br><br>
		Selecciona tu estado de origen:
		<select name="estado">
			<option value="Puebla"> Puebla
			<option value="Tlaxcala"> Tlaxcala
			<option value="Veracruz"> Veracruz
			<option value="Oaxaca"> Oaxaca
			<option value="Tabasco"> Tabasco
		</select> <br><br>

		Selecciona los deportes que practicas: <br>
		<select multiple size="4" name="deportes[]">
			<option value="Parkour"> Parkour
			<option value="Natacion"> Natacion
			<option value="Karate"> Karate
			<option value="DrogasAlv"> Drugs
		</select>
		<br><br>
		<input type="submit" name="Enviar" value="Enviar">
	</form>
</body>
</html>