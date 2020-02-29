<!DOCTYPE html>
<html>
<head>
	<title>Votacion electoral</title>
</head>
<body>
	<hr>
	<form action="votos.php" method="POST">
		Nombre del votante: <input type="text" name="nombre"> <br><br>
		Seleccionar partido de su preferencia: <br> <br>	
		<table>
			<tr>
				<td>
					<img src="pri.png" width="100" height="100"><br><input type="radio" name="partido" value="1"> PRI
				</td>

				<td>
					<img src="pan.jpg" width="100" height="100"> <br> <input type="radio" name="partido" value="2"> PAN
				</td>

				<td>
					<img src="prd.png" width="100" height="100"><br><input type="radio" name="partido" value="3"> PRD
				</td>

				<td>
					<img src="morena.png" width="100" height="100"><br><input type="radio" name="partido" value="4"> MORENA
				</td>
			</tr>
		</table>
		
		<br><br>
		<input type="submit" name="enviar" value="Enviar">
	</form>
</body>
<hr>
</html>