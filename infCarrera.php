<html>
	<head> <title>	Información personal </title> </head>
	<body> 
		<h2>Información personal</h2>
		<hr>
		<form action= "carrera.php" method="POST" enctype="multipart/form-data">
			<br>
			Nombre: <input type= "text" name="nombre" required>
			<br><br>
			Carrera:
			<br><br>
			<input type="radio" name="carrera" value="LCC"> Lic. Cs. Computación
			<input type= "radio" name="carrera" value="ICC" checked> Ing. Cs. Computación		
			<input type= "radio" name="carrera" value="ITI"> Lic.Tec. de la información
			<input type= "radio" name="carrera" value="LIM"> Lic. Ing. Mecantrónica
			<br><br>
			Pasatiempos:
			<br><br>
			<input type = "checkbox" name="pasatiempos[]" value="Futbol"> Futbol <br>
			<input type = "checkbox" name="pasatiempos[]" value="Basketbol"> Basketbol <br>
			<input type = "checkbox" name="pasatiempos[]" value="Ping Pong"> Ping Pong <br>			
			<input type = "checkbox" name="pasatiempos[]" value="Leer"> Leer <br>
			<br> <br>
			Subir fotografía: <br>
			<input type ="file" name="foto">
			<br><br>

			<input type= "hidden" name="promedio" value="8.7">

			<input type="submit" name="enviar" value="Aceptar">
		</form>
	</body>
</html>