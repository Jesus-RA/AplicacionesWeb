<!DOCTYPE html>
<html>
	<head><title>Datos personales</title></head>
	<body>
		<?php

			$name= $_REQUEST['nombre'];			
			$carrera= $_REQUEST['carrera'];
			$promedio= $_REQUEST['promedio'];
			$pasatiempos= $_REQUEST['pasatiempos'];

			$foto= $_FILES['foto']['name'];						
			$ruta= "../AW/Fotos/".$foto;//El punto sirve para concatenar así que concatena la ruta con el nombre de la foto
			copy($_FILES['foto']['tmp_name'], $ruta);
			//echo "Imagen: $foto <br>";
			echo "<img src= 'Fotos/$foto' width='130' height='100'> <br>";

			echo "Nombre: $name <br>";
			echo "Carrera: $carrera <br>";
			echo "Promedio: $promedio <br>";
			echo "Pasatiempos: <br>";						
			$n =count($pasatiempos); //Función de php que cuenta el número de datos que contiene el arreglo
			for($i=0; $i<$n ;$i++){
				echo "$pasatiempos[$i] <br>";			
			}
		?>
	</body>
</html>